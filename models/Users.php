<?php

class Users
{
    private $id;
    private $userName;
    private $email;
    private $password;

    public function setUserId($id)
    {
        $this->id = $id;
    }

    public function getUserId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function setUserEmail($email)
    {
        $this->email = $email;
    }

    public function getUserPassword()
    {
        return $this->password;
    }

    public function setUserPassword($password)
    {
        $this->password = $password;
    }

    public function loadUserById($id)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM Users WHERE id = :ID", array(":ID" => $id));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setUserId($row['id']);
            $this->setUserName($row['name']);
            $this->setUserEmail($row['email']);
            $this->setUserPassword($row['password']);
        }
    }

    public function loadUserByEmail($email)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM Users WHERE email = :EMAIL", array(":EMAIL" => $email));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setUserId($row['id']);
            $this->setUserName($row['name']);
            $this->setUserEmail($row['email']);
            $this->setUserPassword($row['password']);
        }
    }

    /**
     * @return array array of associative arrays (key => value). Key is the column name and value is the data.
     */

    public static function getUsersList()
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM Users ORDER BY name ASC");
        return $results;
    }

    /**
     * @return int id of the last user inserted
     */

    public static function createUser($name, $email, $password)
    {
        $sql = new Mysql();
        $sql->executeQuery("INSERT INTO Users(name, email, password) VALUES (:NAME, :EMAIL, :PASSWORD)", array(":NAME" => $name, ":EMAIL" => $email, ":PASSWORD" => $password));
        return $sql->getConnection()->lastInsertId();
    }

    /**
     * @param int $id
     * @return int quantity of affected rows
     * 
     */
    public function deleteUserById($id)
    {
        $sql = new Mysql();
        return $sql->executeQuery("DELETE FROM Users WHERE id = :ID", array(":ID" => $id))->rowCount();
    }

    public function updateUserById($name, $email, $password)
    {
        $sql = new Mysql();
        return $sql->executeQuery("UPDATE Users SET name = :NAME, email = :EMAIL, password = :PASSWORD WHERE id = :ID", array(":NAME" => $name, ":EMAIL" => $email, ":PASSWORD" => $password, ":ID" => $this->getUserId()))->rowCount();
    }

    public function __toString()
    {
        return json_encode(array(
            "id" => $this->getUserId(),
            "name" => $this->getUserName(),
            "email" => $this->getUserEmail(),
            "password" => $this->getUserPassword(),
        ));
    }

    public function emailExists($email){
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM Users WHERE email = :EMAIL", array(":EMAIL" => $email));
        if (count($results) > 0) {
            return true;
        }else{
            return false;
        }
    }
    public function nameExists($userName){
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM Users WHERE name = :NAME", array(":NAME" => $userName));
        if (count($results) > 0) {
            return true;
        }else{
            return false;
        }
    }
}