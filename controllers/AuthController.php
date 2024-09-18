<?php

require_once 'models/user.php';
class AuthControler
{
        //função respolnsavel pelo processo ce login
    public function login (){

        //verifica se a requisição HTTP é do tipo POST, ou seja, se o formulário foi enviado
        if($_SERVER['REQUEST_METOD'] == 'POST'){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
        }
    }
}

?>