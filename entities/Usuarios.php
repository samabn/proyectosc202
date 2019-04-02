<?php

    class Usuarios {

        private $id;
        private $nombre;
        private $direccion;
        private $correo;
        private $telefono;
        private $usuario;
        private $password;

        function setId($id) {
            $this->id = $id;
        }

        function getId() {
            return $this->id;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function getNombre() {
            return $this->nombre;
        }

        function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        function getDireccion() {
            return $this->direccion;
        }

        function setCorreo($correo) {
            $this->correo = $correo;
        }

        function getCorreo() {
            return $this->correo;
        }

        function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        function getTelefono() {
            return $this->telefono;
        }

        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        function getUsuario() {
            return $this->usuario;
        }

        function setPassword($pass) {
            $this->password = $pass;
        }

        function getPassword() {
            return $this->password;
        }

    }