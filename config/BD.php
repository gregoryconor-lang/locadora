<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=bd_locadora",
                "gregory",
                "qwe123"
            );

            return $conn;
        }
    }