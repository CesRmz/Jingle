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
                extract($_POST);
                return $this->nuevoRegistro($_POST['usuarioID'], $_POST['lat'], $_POST['lon']);
                break;
            default:
                return 404;
                break;
        }
        return 404;
    }

    /** Autorización: Administrador */
    protected function nuevoRegistro($usuarioID, $latitud, $longitud)
    {
        $query = "INSERT INTO registro SET usuarioID = $usuarioID, fecha = NOW(), latitud = $latitud, longitud = $longitud";
        echo $query;
        return APIDatabase::insert($query);
    }
}