<?php
/**
 * Created by PhpStorm.
 * User: Yozki
 * Date: 14/02/2015
 * Time: 03:05 PM
 */

class usuariosControlador
{
    public function procesar($metodo, $verbo, $argumentos)
    {
        switch($metodo)
        {
            case "POST":
                if($verbo == "login")
                {
                    $this->acceso();
                    return $this->datosUsuario();
                }
                break;
            default:
                return 404;
                break;
        }
        return 404;
    }

    public function datosUsuario()
    {
        $user = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        $usuario = Usuario::nuevoUsuarioLogin($user, $password);

        if(!is_null($usuario->usuarioID))
        {
            return $usuario;
        }
        else return 401;
    }

    private function acceso()
    {
        if (!isset($_SERVER['PHP_AUTH_USER']))
        {
            header('WWW-Authenticate: Basic realm="Area restringida"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'El cliente no tiene autorización';
            exit;
        }
        else
        {

        }
    }
}