<?php

namespace Source\App\Api;

use Source\Core\Api;
use Source\Models\Posts as PostModel;
use Source\Models\User;
use Source\Models\Categorie;
use Source\Support\Upload;

/**
 * Class Blog
 * @package Source\App\Api
 */
class Blog extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * index
     * @return void
     */
    public function index(): void
    {
        // Configura o limite e o tempo de request
        $request = $this->requestLimit('getPosts',3, 10);
        if(!$request){
            exit;
        }

        //filtro de parâmetros
        if(!empty($this->params['limit']) && !is_numeric($this->params['limit'])){
            $error['error']['invalid_param'] = "O parâmetro limit deve ser inteiro";
            $this->back($error);
            return;
        }

        $limit = !empty($this->params['limit']) ? (int)$this->params['limit'] : 100;
    
        $posts = (new PostModel())->find()->limit($limit)->order('id')->fetch(true);

        $arrayData = [];

        //foreach post
        foreach($posts as $post){

            if(!empty($this->params['author']) && $this->params['author'] == 'true'){
                $post->info_author = (new User())->findById(1)->data();
            }
            $arrayData['data'][] = $post->data();
        }

        $this->back($arrayData);
        return;
    }

    /**
     * get
     * @param array $data
     * @return void
     */
    public function get(array $data):void
    {
        // Configura o limite e o tempo de request
        $request = $this->requestLimit('getPosts',3, 10);
        if(!$request){
            exit;
        }

        if(!empty($data["id"]) && !is_numeric($data['id'])){
            $this->call(
                400,
                'invalid_param',
                'O parâmetro de buscas deve ser inteiro'
            )->back();
            return;
        }

        $post = (new PostModel())->findById($data['id']);

        if(!$post){
            $this->call(
                400,
                "invalid_id",
                "O post procurado não existe ou foi deletado"
            )->back();
            return;
        }

        $json['data'] = $post->data();

        $this->back($json);
        return;

    }

    /**
     * create
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $content = $data["content"];
        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //filtro de parâmetros
        if(!empty($data['category']) && !is_numeric($data['category'])){
            $this->call(
                400,
                'invalid_param',
                'O parâmetro category deve ser um inteiro'
            )->back();
            return;
        }

        if(!empty($data['author']) && !is_numeric($data['author'])){
            $this->call(
                400,
                'invalid_param',
                'O parâmetro author deve ser inteiro'
            )->back();
            return;
        }

        $postUser = (New User())->findById((int)$data["author"]);
        $postCategorie = (new Categorie())->findById((int)$data["category"]);

        //verifica se o post, user e categoria existem na base de dados
        if(!$postUser){
            $this->call(
                400,
                'invalid_user',
                'Não foi possível encontrar este usuário, por favor, envie um id cadastrado na base'
            )->back();
            return;
        }

        if(!$postCategorie){
            $this->call(
                400,
                'invalid_category',
                'Não foi possível encontrar esta Categoria, por favor, envie um id cadastrado na base'
            )->back();
            return;
        }
    
        $postCreate = new PostModel();
        $postCreate->author = $data["author"];
        $postCreate->category = $data["category"] ?? 1;
        $postCreate->title = $data['title'];
        $postCreate->uri = str_slug($postCreate->title);
        $postCreate->subtitle = $data['subtitle'];
        $postCreate->content = str_replace(["{title}"], [$postCreate->title], $content);
        $postCreate->video = $data['video'] ?? null;
        $postCreate->status = $data['status'] ?? 'draft';
        $postCreate->post_at = !empty($data['post_at']) ? date_fmt_back($data['post_at']) : null;

        

        //upload cover
        if(!empty($_FILES['cover'])){
            $files = $_FILES["cover"];
            $upload = new Upload();
            $image = $upload->image($files, $postCreate->title);

            if(!$image){
                $json["message"] =  $upload->message()->render();
                echo json_encode($json);
                return;
            }

            $postCreate->cover = $image;
        }

        //save post
        if(!$postCreate->save()){
            $this->call(
                400,
                'invalid_data',
                $postCreate->message()->render()

            )->back();
            return;
        }

        //response
        $arrayData["message"] = $postCreate->message()->success('Post criado com sucesso!')->render();
        $arrayData['data'] = $postCreate->data();

        $this->back($arrayData);
        return;
    }

    /**
     * update
     * @param array $data
     * @return void
     */
    public function update(array $data): void
    {
        $content = $data["content"] ?? null;
        $data = filter_var_array($data, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //filtro de parâmetros id, category, author
        if(!empty($data['id']) && !is_numeric($data['id'])){
            $this->call(
                400,
                'invalid_id',
                'O parâmetro de busca deve ser inteiro'
            )->back();
            return;
        }

        if(!empty($data['category']) && !is_numeric($data['category'])){
            $this->call(
                400,
                'invalid_category',
                'O parâmetro category deve ser inteiro'
            )->back();
            return;
        }

        if(!empty($data['author']) && !is_numeric($data['author'])){
            $this->call(
                400,
                'invalid_author',
                'O parâmetro author deve ser inteiro'
            )->back();
            return;
        }

        //verifica se o post, user e categoria existem na base de dados
        $postUpdate = (new PostModel())->findById((int)$data["id"]);
        $postUser = (New User())->findById((int)$data["author"]);
        $postCategorie = (new Categorie())->findById((int)$data["category"]);

        if(!$postUpdate){
            $this->call(
                400,
                'invalid_post',
                'Você tentou atualizar um post que não existe ou que já foi removido'
            )->back();
            return;
        }

        //verifica se o post, user e categoria existem na base de dados
        if(!$postUser){
            $this->call(
                400,
                'invalid_user',
                'Não foi possível encontrar este usuário, por favor, envie um id cadastrado na base'
            )->back();
            return;
        }

        if(!$postCategorie){
            $this->call(
                400,
                'invalid_category',
                'Não foi possível encontrar esta Categoria, por favor, envie um id cadastrado na base'
            )->back();
            return;
        }

        //edita o post com as informações passadas no body da requisição
        $postUpdate->author = $data["author"];
        $postUpdate->category = $data["category"] ?? 1;
        $postUpdate->title = $data['title'];
        $postUpdate->uri = str_slug($postUpdate->title);
        $postUpdate->subtitle = $data['subtitle'];
        $postUpdate->content = str_replace(["{title}"], [$postUpdate->title], $content);
        $postUpdate->video = $data['video'] ?? null;
        $postUpdate->status = $data['status'] ?? 'draft';
        $postUpdate->post_at = !empty($data['post_at']) ? date_fmt_back($data['post_at']) : null;

        //save post
        if(!$postUpdate->save()){
            $json["message"] = $postUpdate->message()->render();
            $json["error"] = $postUpdate->fail();
            echo json_encode($json);
            return;

        }

        $json["message"] = $postUpdate->message()->success('Post atualizado com sucesso!')->render();
        $json['data'] = $postUpdate->data();
        $this->back($json);
        return;
    }

    /**
     * coverUpdate
     * @param array $data
     * @return void
     */
    public function coverUpdate(array $data):void
    {
        //controle de requisições
        $request = $this->requestLimit("blogCover", 3 , 10);
        if(!$request){
            return;
        }

         //filtro de parâmetros
         if(!empty($data['id']) && !is_numeric($data['id'])){
            $this->call(
                400,
                'invalid_param',
                'O parâmetro de busca deve ser um inteiro'
            )->back();
            return;
        }

        $postCover = (new PostModel())->findById((int)$data["id"]);

        //verifica se o post existe
        if(!$postCover){
            $this->call(
                400,
                'invalid_post',
                'O post não foi encontrado, por favor, envie um id válido'
                )->back();
            return;
        }

        $cover = (!empty($_FILES['photo']) ? $_FILES['photo'] : null);
        if(!$cover){
            $this->call(
                400,
                'invalid_data',
                "Envie uma imagem JPG ou PNG para atualizar a foto"
            )->back();
            return;
        }

        //upload
        chdir('../'); //volta um diretório
        $upload = new Upload();
        $newCover = $upload->image($cover, $postCover->title);

        if(!$newCover){
            $this->call(
                400,
                'invalid_data',
                $upload->message()->getText()
            )->back();
            return;
        }

        //remove cover antiga
        if(!empty($postCover->cover)){
            unlink(__DIR__."/../../../{$postCover->cover}");
        }

        //salva o caminho da imagem no post cover.
        $postCover->cover = $newCover;
        $postCover->save();
        $result = $postCover->data();
        $json["message"] = $postCover->message()->success('Cover atualizada com sucesso!')->render();
        $json["data"] = $result;
        
        $this->back($json);
        return;
    }

    /**
     * delete
     * @param array $data
     * @return void
     */
    public function delete(array $data): void
    {
         // Configura o limite e o tempo de request
         $request = $this->requestLimit('deletePosts',3, 10);
         if(!$request){
             exit;
         }

         if(!empty($data["id"]) && !is_numeric($data['id'])){
             $this->call(
                 400,
                 'invalid_param',
                 'O parâmetro de buscas deve ser inteiro'
             )->back();
             return;
         }

         $postDelete = (new PostModel())->findById($data['id']);

         if(!$postDelete){
             $this->call(
                 400,
                 "invalid_id",
                 "O post deletado não existe ou foi excluído"
             )->back();
             return;
         }

        chdir('../'); //volta um diretório
        if($postDelete->cover && file_exists(__DIR__."/../../../{$postDelete->cover}")){
            unlink(__DIR__."/../../../{$postDelete->cover}");
        };

        $postDelete->destroy();
        $json['message'] = $this->message->success("O post foi excluído com sucesso..")->render();
        $json['delete'] = true;

        $this->back($json);
        return;
    }


}
