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

        function validaUser(Usuarios $usuario) {
            $user = $usuario->getUsuario();
            $query = "SELECT id FROM usuarios WHERE usuario = :username";
            $this->ociparse = oci_parse($this->conn, $query);
            oci_bind_by_name($this->ociparse, ":username", $user);
            $id = oci_execute($this->ociparse);
            if(!$id) {
                $this->error = oci_error($this->ociparse);
                $this->error = "Al tratar de obtener los datos se produjo el error: " . $this->error['message'];
                return -1;
            } else {
                $id = 0;
                while(($row = oci_fetch_array($this->ociparse))  != FALSE) {
                    $id = $row['ID'];
                }
                return $id;
            }
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

        function login(Usuarios $usuario) {
            //session_start();
            //$query = "SELECT id, password FROM usuarios WHERE usuario = :username AND password = :pass";
            $query = "SELECT id, usuario, password FROM usuarios WHERE usuario = :username";
            $this->ociparse = oci_parse($this->conn, $query);
            $user = $usuario->getUsuario();
            oci_bind_by_name($this->ociparse, ":username", $user);
            //oci_bind_by_name($ociparse, ":pass", $pass);
            $resultset = oci_execute($this->ociparse);
            if(!$resultset) {
                $this->error = oci_error($this->ociparse);
                $this->error = "Al tratar de obtener los datos se produjo el error: " . $this->error['message'];
                return -1;
            } else {
                //$resultset = "true";
                return $resultset = oci_fetch_array($this->ociparse, OCI_ASSOC);
                /*while(($row = oci_fetch_array($ociparse, OCI_ASSOC))  != FALSE) {
                    $resultset = $row;
                }*/
                /*echo "UsersModel<br>";
                var_dump($resultset);

                /*if($row == false) {
                    $resultset = ['ID' => 0];
                } else {
                    while($row != FALSE) {
                        $resultset = $row;
                    }
                }*/
                //return $resultset;
            }
        }


        function __destruct() {
            oci_free_statement($this->ociparse);
            oci_close($this->conn);
        }

    }
    
    /*$um = new UsersModel();
    $um->print();*/
    