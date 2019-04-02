<?php

    class UsersModel extends Conexion {

        private $error;
        private $ociparse;
        
        function __construct() {
            try {
                parent::__construct();                
            } catch(Exception $ex) {
                $this->error = $ex;
            }            
        }

        function getError() {
            return $this->error;
        }
        
        function saveUser(Usuarios $usuario) {
            $this->ociparse = oci_parse($this->conn, "INSERT INTO usuarios VALUES(pagos_ts_seq.NEXTVAL, :nom, :dire, :mail, :tel, :username, :pass)");            
            $name = $usuario->getNombre();
            $address = $usuario->getDireccion();
            $mail = $usuario->getCorreo();
            $tel = $usuario->getTelefono();
            $user = $usuario->getUsuario();
            $pass = $usuario->getPassword();
            oci_bind_by_name($this->ociparse, ":nom", $name);
            oci_bind_by_name($this->ociparse, ":dire", $address);
            oci_bind_by_name($this->ociparse, ":mail", $mail);
            oci_bind_by_name($this->ociparse, ":tel", $tel);
            oci_bind_by_name($this->ociparse, ":username", $user);
            oci_bind_by_name($this->ociparse, ":pass", $pass);
            
            if(!oci_execute($this->ociparse)) {
                $this->error = oci_error($this->ociparse);
                $this->error = "Al tratar de insertar los datos se produjo el error: " . $this->error['message'];
                return false;
            } else {
                return true;
            }
        }

        function __destruct() {
            oci_free_statement($this->ociparse);
            oci_close($this->conn);
        }

    }
    