<?php

//Inclui o arquivo de conexão que contem a class Database para gerenciar a conexão com o BD
require_once 'models/database.php';

class User
{
    //Função para encontrar um usuario pelo email
    public static function findByEmail($email){

        //coleta a conexão com BD
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT * FROM usuarios  WHERE email = :email");
        //executa a consulta com email passado como parametro
        $stmt->execute(['email' => $email]);

        //retorna os dados do usuario encontrado como um array associativo 
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }


    static public function find($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT *FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    //Função para criar um novo usuario no bancode dados
    static public function create($data){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)");
        $stmt->execute($data);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>