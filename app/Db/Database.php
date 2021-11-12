<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    //credenciais do banco - HOST, NAME, USER, PASS

    //Host de conexão com o banco
    const HOST = 'localhost';

    //Nome do banco
    const NAME = 'db_vagas';

    //Usuário do banco
    const USER = 'root';

    //SEnha do banco
    const PASS = '';

    //Nome da tabela a ser manipulada
    private $table;

    //Instância de conexão com o banco (PDO)
    private $connection;

    //define a tabela que instância a conexão
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }


    //Metodo responsável por criar uma conexão com o banco - defuine uma instância de PDO 
    private function setConnection(){
        try{
            //Tentar conectar com o banco
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            //testa se tem algum erro de query la no banco
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            //mensagem de erro para teste
            die('ERROR: '.$e->getMessage());
        }
    }

    /*Método responsável por executar queries dentro do banco
        recebe 1º $query string
               2º $params array
               3º return PDOStatement
    */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            //mensagem de erro para teste
            die('ERROR: '.$e->getMessage());
        }
    }

    /*Metodo responsavel por inserir dados no banco
    array $values [ nomeDoCampo => valorInserido ]
    return interger (ID inserido)
    */
    public function insert($values){
        //Dados da query
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');

        //echo "<pre>"; print_r($binds); echo "</pre>"; exit;

        //Montando a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        //Executa o insert
        $this->execute($query,array_values($values));

        //Retorna ID inserido
        return $this->connection->lastInsertId();
    }

    /* Método responsavel por executar uma consulta no banco 
        $where string
        $order string
        $limit string
        $fields string
        return PDOStatement
    */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        /*Dados da query - condição ternaria (se tiver conteudo na variavel $where) define ela como WHERE e o valor dela mesma, 
        caso não tenha valor ela vai ficar vazia ("a mesma coisa para $order e $limit") */
        $where = strlen($where) ? 'WHERE' .$where : '';
        $where = strlen($order) ? 'WHERE' .$order : '';
        $where = strlen($limit) ? 'WHERE' .$limit : '';

        //Monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //Executa a query
        return $this->execute($query);
    }




}