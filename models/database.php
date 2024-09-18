<?php
class Database{
    //utiliza o padrao singleton, cujo objetivo é garantir que apenas uma unica instancia de uma classe seja criada durante a execução do programa, e que essa instancia seja realizada sempre que necessario .
    private static $instance = null;

    // Metod publico que retorna a conexão com BD
    public static function getConection(){
        if(!self::$instance){
            $host       ='localhost';
            $db         ='sistema_usuarios';
            $user       =''
            $password
        }
    }
}
?>