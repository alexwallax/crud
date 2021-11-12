<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga {

    //identificador unico da vaga "int" 
    public $id;

    //Título da vaga 
    public $titulo;

    //Descrição da vaga (pode conter html)
    public $descricao;

    //Define se a vaga esta ativa - string(s/n) 
    public $ativo;

    //Data de publicação da vaga string 
    public $data;

    //criando a função para cadastrar uma nova vaga retorna (boolean)
    public function cadastrar(){
        //Definir data
        $this->data = date('Y-m-d H:i:s');

        //Inserir a vaga no banco
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                                        'titulo'    => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'ativo'     => $this->ativo,
                                        'data'      => $this->data
                                        ]);

        //echo "<pre>"; print_r($this); echo "</pre>"; exit;

        //Retornar sucesso
        return true;                                
    }
    /* Metodo responsavel por obter as vagas do banco de dados
        $where string
        $order string
        $limit string
        return array
     */
    public static function getVagas($where = null, $order = null, $limit = null){
        //metodo select criado dentro de Database.php
        return (new Database('vagas'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);


    }


}