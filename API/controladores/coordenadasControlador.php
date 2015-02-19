<?php
/**
 * Created by PhpStorm.
 * User: Yozki
 * Date: 26/01/2015
 * Time: 09:28 PM
 */

class coordenadasControlador
{
    public function procesar($metodo, $verbo, $argumentos)
    {
        switch($metodo)
        {
            case "POST":
                $this->acceso();
                return $this->nuevoRegistro($_POST['lat'], $_POST['lon']);
                break;
            case "GET":
                $this->acceso();
                return $this->getCoordenadasUsuario();
                break;
            default:
                return 404;
                break;
        }
        return 404;
    }

    public function nuevoRegistro($latitud, $longitud)
    {
        $user = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        $usuario = Usuario::nuevoUsuarioLogin($user, $password);

        if(!is_null($usuario->usuarioID))
        {
            $query = "INSERT INTO registro SET usuarioID = $usuario->usuarioID, fecha = NOW(), latitud = $latitud, longitud = $longitud";
            APIDatabase::insert($query);
            return 201;
        }
        else return 401;
    }
    public function getCoordenadasUsuario()
    {
        $user = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        $usuario = Usuario::nuevoUsuarioLogin($user, $password);

        if(!is_null($usuario->usuarioID))
        {
            $coordenadas = $usuario->getCoordenadas();
            return $coordenadas;
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