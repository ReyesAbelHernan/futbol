<?php

require_once('DBModel.php');

class LoginModel extends DBModel
{
    function getAll()
    {
        $query = $this->getDb()->prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerUserByUsername($username)
    {
        $query = $this->getDb()->prepare('SELECT * FROM user WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function isMailInUse($email)
    {
        $query = $this->getDb()->prepare('SELECT email FROM user');
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_COLUMN);
        foreach ($resultado as $date)
            if ($email === $date)
                return true;
        return false;
    }

    public function addNewUser($user, $pass, $email)
    {
        $passEnc = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->getDb()->prepare('INSERT INTO user (username,password,email) VALUES (?, ?, ?)');
        $query->execute([$user, $passEnc, $email]);
    }
}
