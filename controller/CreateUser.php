<?php

    require_once '../model/config.inc.php';
    require_once '../model/Conexion.php';
    require_once '../entities/Usuarios.php';
    require_once '../model/UsersModel.php';

    class CreateUser {

        function saveUser($name, $address, $mail, $tel, $user, $pass) {
            $usuario = new Usuarios();
            $usuario->setNombre($name);
            $usuario->setDireccion($address);
            $usuario->setCorreo($mail);
            $usuario->setTelefono($tel);
            $usuario->setUsuario($user);
            $usuario->setPassword($pass);
            $usersmodel = new UsersModel();
            if($usersmodel->saveUser($usuario)) {
                echo "1"; #EN CASO DE EXITO SERÁ UN 1
            } else {
                echo $usersmodel->getError(); #EN CASO DE ERROR SERÁ UN 0
            }
        }

    }

$createuser = new CreateUser();
$createuser->saveUser($_POST['name'], $_POST['address'], $_POST['mail'], $_POST['tel'], $_POST['user'], $_POST['pass']);