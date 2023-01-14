<?php

namespace Source\Core;

/**
 * Class Connect [ Singleton Pattern ]
 * @author Pablo O.Mesquita <pablo_omesquita@hotmail.com>
 * @package Source\Core
 */

class Connect
{
    /** @const arrat */
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //idioma padrao
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, //todo erro é tratado com exception
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,//retorno o fetchall como objeto
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL, //garante o mesmo nome de coluna do banco de dados
    ];

    /** @var \PDO */
    private static $instance;
    
    /**
     * getInstance
     *
     * @return \PDO
     */
    public static function getInstance(): ?\PDO
    {
        if(empty(self::$instance)){

            try{
                self::$instance = new \PDO(
                    "mysql:host=".CONF_DB_HOST.";dbname=".CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASS,
                    self::OPTIONS
                );
            }catch(\PDOException $e){
                echo "Erro encontrado: ".$e;
            }
        }

        return self::$instance;
    }
    

    # mesmo que herde a classe, não poderesmo executar nenhuma dessas rotinas
    /**
     * _construct
     *
     * @return void
     */
    final private function _construct()
    {

    }
    
    /**
     * __clone
     *
     * @return void
     */
    final private function __clone()
    {
        
    }
}