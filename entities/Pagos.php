<?php

    class Pagos {

        private $id;
        private $fecha;
        private $concepto;
        private $monto;
        private $num_tarjeta;
        private $id_usuario;
        private $id_provedor;
        private $nombre_proveedor;

        function setId($id) {
            $this->id = $id;
        }

        function getId() {
            return $this->id;            
        }
        function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        function getFecha() {
            return $this->fecha;
        }
        function setConcepto($concepto) {
            $this->concepto = $concepto;
        }

        function getConcepto() {
            return $this->concepto;
        }
        function setMonto($monto) {
            $this->monto = $monto;
        }

        function getMonto() {
            return $this->monto;
        }
        function setNumTarjeta($num_tarjeta) {
            $this->num_tarjeta = $num_tarjeta;
        }

        function getNumTarjeta() {
            return $this->num_tarjeta;
        }
        function setIdUsuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        function getIdUsuario() {
            return $this->id_usuario;
        }
        function setIdProveedor($id_provedor) {
            $this->id_proveedor = $id_provedor;
        }

        function getIdProveedor() {
            return $this->id_proveedor;
        }

        function setNombreProveedor($nombre_proveedor) {
            $this->nombre_proveedor = $nombre_proveedor;
        }

        function getNombreProveedor() {
            return $this->nombre_proveedor;
        }
        
    }