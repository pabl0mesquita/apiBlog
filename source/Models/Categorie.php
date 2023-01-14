<?php
namespace Source\Models;

use Source\Core\Model;

class Categorie extends Model
{
    public function __construct()
    {
        parent::__construct('categories', [''],['']);
    }
}