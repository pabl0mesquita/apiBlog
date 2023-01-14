<?php

namespace Source\App\Api;

use Source\Core\Api;
use Source\Models\Censo as DataCenso;

/**
 * Class Users
 * @package Source\App\Api
 */
class Censo extends Api
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
        $dados = (new DataCenso())->find()->limit(1000)->offset(1)->fetch(true);

        $arrayData = [];

        foreach($dados as $data){
            $arrayData[] = $data->data();
        }

        $this->back($arrayData);

        return;
    }
}