<?php

namespace Source\Models;

use Source\Core\Model;

class Posts extends Model
{
    public function __construct()
    {
        parent::__construct('posts', [''],['']);
    }

    /**
     * save
     * @return bool
     */
    public function save(): bool
    {
        $checkUri = (new Posts())->find("uri = :uri AND id != :id","uri={$this->uri}&id={$this->id}");
        if($checkUri->count()){
            $this->uri = "{$this->uri}-{$this->lastId()}";
        }

        return parent::save();
    }
}