<?php
/**
 * Created by PhpStorm.
 * User: Yozki
 * Date: 14/02/2015
 * Time: 02:01 PM
 */

class UsuarioModelo
{
    public $usuarioID;
    public $nombre;
    public $usuario;
    public $password;

    public function __construct($usuarioID)
    {
        $query = "SELECT * FROM usuario WHERE usuarioID = $usuarioID";
        $res = APIDatabase::select($query);

        $this->usuarioID    = $res[0]["usuarioID"];
        $this->nombre       = $res[0]["nombre"];
        $this->usuario      = $res[0]["usuario"];
        $this->password     = $res[0]["password"];
    }

    public function nuevoUsuarioLogin($_usuario, $_password)
    {
        $query = "SELECT * FROM usuario WHERE usuario = '$_usuario' AND password = '$_password'";
        $res = APIDatabase::select($query);
        return new self($res[0]['usuarioID']);
    }
}