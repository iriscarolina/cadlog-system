<?php

class DashboardController
{
    //função index, responsavel por exibir a pagina do dashboard
    public function index()
    {
    //Função que vai iniciar a sessão para verificar se o usuario esta autenticado
    session_start();

    if(!isset($_SESSION['usuario_id'])){
        //redireciona o usuario para a pagina inicial
        header('Location: index.php');
        exit; //garante que o script seja interrompido

    }
    //se o usuario estiver autenticado, inclui a view 'dashboard', que exibe o painel de controle
    include 'views/dashboard.php';
    
    }
}
?>
