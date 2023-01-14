<?php

namespace Source\App\Api;

use Source\Core\Api;

/**
 * Class Users
 * @package Source\App\Api
 */
class User extends Api
{
    /**
     * Users constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * list user data
     */
    public function index(): void
    {
       
        $response["user"] = 'teste';
        //usa o método back para criar o response e enviar ao usuário
        $this->back($response);

        return;
    }
}