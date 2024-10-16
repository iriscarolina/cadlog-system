<?php
// inclui arquivo de controlador necessarios para lidar com diferentes ações
require 'controllers/AuthController.php'; // inclui controlador de autenticação
require 'controllers/UserController.php'; //instancia o controlador de usuario
require 'controllers/DashboardController.php'; //instancia controlador de dashboard

//cria instancia dos controladores para utilizar seus metodos
$authController = new AuthController();
$userController = new UserController();
$dashboardController = new DashboardController();
//$dashboardController = new DashboardController();

// Coleta a ação da URL, se não houver ação definida, usa 'login' como padrão
$action = $_GET['action'] ?? 'login'; // Usa operador de coalescencia nula (??) para defnir 'login' se 'action' não estiver presente
 
switch ($action){
    case 'login':
        $authController->login();
        break;
    case 'register':
        $userController->register();
        break;
     case 'dashboar':
        $dashboardController->index();
        break;

    default:
    $authController->login();
    break;
}

?>