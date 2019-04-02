<?php

    class Proveedores {

        private $Id;
        private $nombre;

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
        
    }
    