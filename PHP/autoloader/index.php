<?php  

    require_once "autoload.php";
    use Negocio\Usuario;
    use Datos\Usuario;
    
    $usuario = new Usuario();
    echo $usuario->saludar();

?>