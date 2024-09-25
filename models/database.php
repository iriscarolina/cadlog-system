<?php
class Database{
    //utiliza o padrao singleton, cujo objetivo é garantir que apenas uma unica instancia de uma classe seja criada durante a execução do programa, e que essa instancia seja realizada sempre que necessario .
    private static $instance = null;

    // Metod publico que retorna a conexão com BD
    public static function getConnection(){
        if(!self::$instance){
            $host       ='localhost';
            $db         ='sistema_usuarios';
            $user       ='root';
            $password   ='';

            //A conexão usa o drive Mysql (mysql:) e as informações de host BD
            self::$instance = new PDO("mysql:host=$host;dbname=$db", $user, $password);

            //define o modo de erro para conexões, facilitando a depuração e tratamento dos erros
            self::$instance->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>