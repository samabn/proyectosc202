<?php
    @session_start();

    class CloseSession {
        function closeSession() {
            $_SESSION = array();/** ESTA LINEA DESTRUYE TODAS LAS VARIABLES DE LA SESION ***/
            session_destroy();
            header("location: ../views");
        }
    }

$closesession = new CloseSession();
$closesession->closeSession();