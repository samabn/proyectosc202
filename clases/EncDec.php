<?php

    class EncDec {

        /*private $pass;
        private $hash;*/

        function __construct() {
            /*$this->pass = $pass;
            $this->hash = $hash;*/
        }

        function encrypt($pass) {
            //$opciones = ['cost' => 15];
            //return password_hash($pass, PASSWORD_DEFAULT, $opciones);#password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash fuerte de único sentido.
                /* LOS PARAMETROS QUE RECIBE SON:
                PASSWORD_DEFAULT - Usar el algoritmo bcrypt (predeterminado a partir de PHP 5.5.0). Observe que esta constante está diseñada para cambiar siempre que se añada un algoritmo
                nuevo y más fuerte a PHP. Por esta razón, la longitud del resultado de usar este identificador puede cambiar con el tiempo. Por lo tanto, se recomienda almacenar el
                resultado en una columna de una base de datos que pueda apliarse a más de 60 caracteres (255 caracteres sería una buena elección). 
                opciones - Un array asociativo de opciones, en este caso se le esta pasando el cost del algoritmo, por default el cost predeterminado es de 10*/
            return password_hash($pass, PASSWORD_DEFAULT);
        }

        function decrypt($pass, $hash) {
            return password_verify($pass, $hash);
        }

    }
