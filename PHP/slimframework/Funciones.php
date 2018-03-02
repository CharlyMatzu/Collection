<?php
class Funciones{

    /**
     * @param $result bool|mysql_result
     * @return array|null|false
     */
    public static function getDatos($result){
        $datos = array();

        if( $result == false )
            return false;

        while( $dato = mysqli_fetch_assoc( $result ) ){
            $datos[] = $dato;
        }
        //Array vacio
        if( empty($datos) )
            return null;
        else
            return $datos;
    }

}