<?php

    #require_once './config.inc.php';#INCLUIMOS EL ARCHIVO DE CONFIGURACION

    class Conexion {#SE CREA UNA CLASE 

        protected $conn;#SE DECLARA UN ATRIBUTO DE LA CLASE
        //private $error;

        function __construct() {#EL CONSTRUCTOR DE LA CLASE DONDE SE ESTABLECE LA CONEXION CON LA DB
            $this->conn = oci_connect(USER, PASS, SERVER);/*LA FUNCION oci_connect RECIBE LOS PARÁMERTROS DEL ARCHVIO config, EN CASO DE 
            EXITO DEVUELVE UNA CONEXION AL DB, PERO EN CASO DE ERROR DEVUELVE false*/
            if(!$this->conn) {
                $this->error = oci_error();/*LA FUNCION oci_error PERMITE CAPTURAR LOS ERRORES Y DE ESTA MENRA TENER INFORMACIÓN MÁS DETALLADA
                DE LOS MISMOS, EN CASO DE NO HABER ERROR DEVUELVE FALSE De lo contrario, oci_error() devuelve la información del error como un
                array asociativo. CUANDO SE USA PARA COMPROBAR ERRORES DE oci_connect NO SE LE PASAN PARÁMETROS*/
                throw new Exception("Al tratar de conectar con la DB se produjo el error: " . $this->error['message']);/*EN CASO DE ERROR LANZAMOS
                UNA EXCEPTION*/
            }
        }

    }

    /*PROBAMOS LA CONEXIÓN, EN CASO DE NO TENER ERRORES EN LA PAGINA VEREMOS exito!!!, DE LO CONTRARIO LA PAGINA MOSTRARÁ INFORMACION DEL ERROR*/
    /*try {
        $conexion = new Conexion();
        echo "Exito!!!";
    } catch(Exception $ex) {
        echo $ex;
    }*/
    