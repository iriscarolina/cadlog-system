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


    }

    //Função para buscar todos os usuarios da base de dados 
    public static function all(){
        $conn = Database:: getConnection();
        $stmt = $conn->query("SELECT * FROM usuarios");
        //retorna todos os usuarios com um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    //Função responsavel pela atualização dos dados dos usuarios na base de dados 
    public static function update($id, $data){
        $conn = Database::getConnection();
        //prepara uma consulta SQL para atualizar, nome, email e perfil, com base no id do usuario
        $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, perfil = :perfil WHERE id = :id");

        $data['id'] = $id;

        $stmt->execute($data);

    }

    //função para excluir o usuario da base de dados pelo ID
    public static function delete ($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

}
?>