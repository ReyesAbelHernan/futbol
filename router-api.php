<?php
require_once 'Router.php';
require_once 'api/ApiController.php';
require_once 'api/ApiComentariosController.php';


$router = new Router();




$router->addRoute('comentarios', "POST", 'ApiComentariosController', 'InsertComentario');
$router->addRoute('comentarios/:ID', "GET", 'ApiComentariosController', 'GetComentarios');
$router->addRoute('comentarios/:ID', "DELETE", 'ApiComentariosController', 'deleteComentario');





$router->addRoute("admin/:ID", "POST", "LoginController", "SetUserToAdmin");
$router->addRoute("registrado/:ID", "POST", "LoginController", "SetAdminToUser");
$router->addRoute("deleteUser/:ID", "POST", "LoginController", "deleteUser");




$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
