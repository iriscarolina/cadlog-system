<?php
class UserController
{
     //Função para registrar um novo usuário
    public function register(){
            //Verifica se a requisição HTTP é do tipo POST
        if($_SERVER ['REQUEST_METHOD'] == 'POST'){
            //Coleta dados enviados e armazena em um array
            $data = [
                'nome'  => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), //Criptografa a senha
                'perfil'=> $_POST['perfil']
            ];
 
            // Chama o metódo create do Model User para criar um novo usuário no BD
            User::create($data);
            header('Location: index.php');
        }else{
            include 'views/register.php';
        }
    }
 
    public function list(){
        $users = User::all();
        include 'views/list_users.php';
    }
 
    public function edit($id){
        session_start();
 
        if($_SESSION['perfil'] == 'admin' || $_SESSION['perfil'] == 'gestor'){
            $user = User::find($id);
 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'nome'  => $_POST['nome'],
                    'email' => $_POST['email'],
                    'perfil'=> $_POST['perfil']
                ];
 
                User::update($id, $data);
                header('Location: index.php?action=list');
            }else{
                include 'views/edit_user.php';
            }
        }else{
            echo 'Você não tem permissão para editar usuários';
        }
    }
 
    public function delete($id){
        User::delete($id);
        header('Location: index.php?action=list');
    }
}
 
?>