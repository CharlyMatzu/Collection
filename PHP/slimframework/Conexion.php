<?php

class Conexion{

    private $datos = [
        'host' => "localhost",
        'user' => 'prueba',
        'pass' => '123456',
        'db'   => 'test'
    ];
    private $_connection;
    

    function __construct(){
        $this->_connection = new mysqli(
            $this->datos['host'],
            $this->datos['user'],
            $this->datos['pass'],
            $this->datos['db']
        );

        //TODO: Modificar para poder regresar error y mostrar en vista
         //Manejo de error
        if( mysqli_connect_error() ) {
            trigger_error("Error al tratar de conectar con MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }

        /* cambiar el conjunto de caracteres a utf8 para aceptar tildes y 'eñes' */
        if ( !$this->_connection->set_charset('utf8') ) {
            printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->_connection->error);
        }
    }

    /**
     * Permite ejecutar un query
     *
     * @param String $query
     * @return bool|mysqli_result
     */
    function doQuery($query){
        return $this->_connection->query($query);
    }

    /**
     * Cierra la conexion
     *
     * @return bool
     */
    function close(){
        return $this->_connection->close();
    }

}
