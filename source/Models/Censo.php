<?php
namespace Source\Models;

use Source\Core\Model;

class Censo extends Model
{
    public function __construct()
    {
        parent::__construct('brasil_csv_gz', [''],['']);
    }
}