<?php

namespace Source\Core;

use PDOException;
use PDOStatement;
//use Source\Support\Message;
use Source\Core\Connect;
use Source\Support\Message;


abstract class Model {

    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var Message|null */
    protected $message;

    /** @var string */
    protected $query;

    /** @var */
    protected $params;

    /** @var string */
    protected $order;

    /** @var int */
    protected $limit;

    /** @var int */
    protected $offset;

    /** @var string $entity database table */
    protected $entity;

    /** @var array $protected no update or create */
    protected $protected;

    /** @var array $entity database table */
    protected $required;


    public function __construct(string $entity, array $protected, array $required)
    {
        $this->entity = $entity;

        $this->protected = array_merge($protected, []);

        $this->required = $required;

        $this->message = new Message();
    }

    /**
     * __set
     */
    public function __set($name, $value)
    {
        if(empty($this->data))
        {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * Message
     * @return null||Message
     */
    public function message(): ?Message
    {
        return $this->message;
    }
    
    /**
     * data
     *
     * @return object
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @param string $columnOrder
     * @return Model
     */
    public function order(string $columnOrder): Model
    {
        $this->order = " ORDER BY {$columnOrder}";
        return $this;
    }

    /**
     * @param int $limit
     * @return Model
     */
    public function limit(int $limit): Model
    {
        $this->limit = " LIMIT {$limit}";
        return $this;
    }

    /**
     * @param int $offset
     * @return Model
     */
    public function offset(int $offset): Model
    {
        $this->offset = " OFFSET {$offset}";
        return $this;
    }

      /**
     * @param string $key
     * @return int
     */
    public function count(): int
    {
        $stmt = Connect::getInstance()->prepare($this->query);
        $stmt->execute($this->params);
        return $stmt->rowCount();
    }
    
     /**
     * @param null|string $terms
     * @param null|string $params
     * @param string $columns
     * @return Model|mixed
     */
    public function find(?string $terms = null, ?string $params = null, string $columns = "*")
    {
        if ($terms) {
            $this->query = "SELECT {$columns} FROM {$this->entity} WHERE {$terms}";
            parse_str($params, $this->params);
            return $this;
        }

        $this->query = "SELECT {$columns} FROM {$this->entity}";
        return $this;
    }

     /**
     * @param int $id
     * @param string $columns
     * @return null|mixed|Model
     */
    public function findById(int $id, string $columns = "*"): ?Model
    {
        $find = $this->find("id = :id", "id={$id}", $columns);
        return $find->fetch();
    }
    
    /**
     * fetch
     *
     * @param  mixed $all
     * @return 
     */
    public function fetch(bool $all = false)
    {
        try{

            $stmt = Connect::getInstance()->prepare($this->query. $this->order .  $this->limit .  $this->offset);
            
            $stmt->execute($this->params);

            if(!$stmt->rowCount()){
                return null;
            }

            if($all){
                return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
            }

            return $stmt->fetchObject(static::class);

        }catch(PDOException $exception)
        {
            //$this->fail = $exception;
            $this->message =  [
                "code" => $exception->getCode(),
                "message" => $exception->getMessage(),
                "file" => $exception->getFile(),
                "line" => $exception->getLine()
            ];
            return $this;
        }
    }

    ############
    ### CRUD ###
    ############
    public function create(array $data)
    {
        try{

            $columns = implode(", ", array_keys($data));
            $values = ":". implode(", :",array_keys($data));

            //var_dump($columns, $values);
            
            //echo "INSERT INTO {$this->entity} ({$columns}) VALUES ({$values})";
            //return;

            $stmt = Connect::getInstance()->prepare("INSERT INTO {$this->entity} ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));

            return Connect::getInstance()->lastInsertId();

        }catch(PDOException $exception)
        {
            $this->fail = $exception;
            return null;
        }
    }
    
    /**
     * read
     *
     * @param  string $select
     * @param  string|array $params
     * @return null|PDOStatement
     */
    public function read(string $select, string $params = null): ?PDOStatement
    {
        try{
            $stmt = Connect::getInstance()->prepare($select);

            if($params){
                parse_str($params, $params);
                foreach($params as $key => $value){
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;

        }catch(PDOException $exception){
            $this->fail = $exception;
            return null;
        }
    }
    
    /**
     * update
     *
     * @param  array $data
     * @param  string $terms
     * @param  string $params
     * @return null|int
     */
    public function update(array $data, string $terms, string $params): ?int
    {
        try{
            $dataSet = [];
            foreach($data as $bind => $value){
                $dataSet[] =  "{$bind} = :{$bind}";
            }

            $dataSet = implode(", ", $dataSet);

            parse_str($params, $params);
           

            //var_dump($dataSet, $params);

            $stmt = Connect::getInstance()->prepare("UPDATE {$this->entity} SET {$dataSet} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $params)));
            return ($stmt->rowCount() ?? 1);


        }catch(PDOException $exception){
            $this->fail = $exception;
            return null;
        }

    }
    
    /**
     * delete
     *
     * @param  string $terms
     * @param  null|string|array $params
     * @return bool
     */
    public function delete(string $terms, ?string $params = null): ?bool
        {
            try{
                $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->entity} WHERE {$terms}");

                if($params){
                    parse_str($params, $params);
                    $stmt->execute($params);
                    return true;
                }
                $stmt->execute($params);
                return true;

            }catch(PDOException $exception){

                $this->fail = $exception;
                $this->message =  [
                    "code" => $exception->getCode(),
                    "message" => $exception->getMessage(),
                    "file" => $exception->getFile(),
                    "line" => $exception->getLine()
                ];
                return false;
            }
    }
    
    /**
     * save
     *
     * @return bool
     */
    public function save(): bool
    {
        /** updated */
        if(!empty($this->id)){
            $id = $this->id;
            $this->update($this->safe(), "id = :id", "id={$id}");
            if($this->fail()){
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** create */
        if(empty($this->id)){
            $id = $this->create($this->safe());
            if($this->fail()){
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = $this->findById($id)->data();
        return true;
    }

    /**
     * lastId
     * @return int
     */
    public function lastId(): int
    {
        return Connect::getInstance()->query("SELECT MAX(id) as maxId FROM {$this->entity}")->fetch()->maxId + 1;
    }

     /**
     * @return bool
     */
    public function destroy(): bool
    {
        if(empty($this->id)) {
            return false;
        }

        $destroy = $this->delete("id = :id", "id={$this->id}");
        return $destroy;
    }

    #filtros

    /**
     * safe
     *
     * @return array
     */
    protected function safe(): ?array
    {
        $safe = (array)$this->data;
        foreach ($this->protected as $unset) {
            unset($safe[$unset]);
        }
        return $safe;
    }


      /**
     * @param array $data
     * @return array|null
     */
    private function filter(array $data): ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_DEFAULT));
        }
        return $filter;
    }

      /**
     * @return bool
     */
    protected function required(): bool
    {
        $data = (array)$this->data();
        foreach ($this->required as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }

  
}