<?php

require_once('DBModel.php');

class Model extends DBModel
{

  
    //* crea un arreglo con un id*//
    function getPlayer($id)
    {
        $query = $this->getDb()->prepare('SELECT * FROM player WHERE id = ?');
        $query->execute(array(($id)));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getTeamId($id)
    {
        $query = $this->getDb()->prepare('SELECT * FROM team WHERE id = ?');
        $query->execute(array(($id)));
        return $query->fetch(PDO::FETCH_OBJ);
    }



    //** funciones que crean una fila en las tablas */

    function newPlayer($name,$subname,$number,$id_team,$nationality,$photo=NULL)
    {
        $query = $this->getDb()->prepare('INSERT INTO `player`(`name`, `subname`, `number`, `id_team`,`nationality`)VALUES (?,?,?,?,?)');
        $query->execute([$name,$subname,$number,$id_team,$nationality]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function newPlayerWhitImg($name,$subname,$number,$id_team,$nationality,$nameArchivo,$extensionArchivo,$temporario){

        $nuevoNombre=md5(time().$nameArchivo).'.'.$extensionArchivo;

        $filepath = 'imagenes/';

        $destino = $filepath.$nuevoNombre;

        move_uploaded_file($temporario,$destino);
        
        $query = $this->getDb()->prepare('INSERT INTO `player`(`name`, `subname`, `number`, `id_team`,`nationality`,photo)VALUES (?,?,?,?,?,?)');
        $query->execute([$name,$subname,$number,$id_team,$nationality,$destino]);
        return $query->fetch(PDO::FETCH_OBJ);

    }

    function newTeam($team)
    {
        $query = $this->getDb()->prepare('INSERT INTO team (team)VALUES (?)');
        $query->execute([$team]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    //** funciones que borran una fila de la base de datos  */

    function deletePlayer($id)
    {
        $query = $this->getDb()->prepare('DELETE FROM player WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
 
    function deleteTeam($id)
    {
        $query = $this->getDb()->prepare('DELETE FROM team WHERE id= ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    //** funcion que borran una celda de la base de datos player */

    function deleteImage($id)
    {
        $query = $this->getDb()->prepare('UPDATE player SET photo=NULL  WHERE id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }



    //** crea un array de player y team de sus respectivas tablas */

    function getAllPlayer()
    {
        $query = $this->getDb()->prepare('SELECT * FROM player');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getTeam()
    {
        $query = $this->getDb()->prepare('SELECT * FROM team');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
 

        //** crea un array de player segun el team de sus respectivas tablas */

    function getPlayerByTeam($id_team)
    {
        $query = $this->getDb()->prepare('SELECT * FROM player WHERE id_team = ?');
        $query->execute([$id_team]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //** actualiza los valores de una fila en la tabla players */

    public function updatePlayerWhitImg($id,$name,$subname,$number,$id_team,$nationality,$nameArchivo,$extensionArchivo,$temporario) {
        
        $nuevoNombre=md5(time().$nameArchivo).'.'.$extensionArchivo;

        $filepath = 'imagenes/';

        $destino = $filepath.$nuevoNombre;

        move_uploaded_file($temporario,$destino);

        $query = $this->getDb()->prepare('UPDATE player SET name = ? , subname = ?, number = ? , id_team = ? , nationality = ? , photo = ? WHERE id=?');
        $query ->execute([$name,$subname,$number,$id_team,$nationality,$destino,$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    public function updatePlayer($id,$name,$subname,$number,$id_team,$nationality)
    {
        $query = $this->getDb()->prepare('UPDATE player SET name = ? , subname = ?, number = ? , id_team = ? , nationality = ?  WHERE id=?');
        $query ->execute([$name,$subname,$number,$id_team,$nationality,$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //** actualiza los valores de una fila en la tabla team */

    public function updateTeam($id,$team)
    {
        $querys = $this->getDb()->prepare('UPDATE team SET team = ? WHERE id=?');
        $querys->execute(array($team,$id));
    }


}


