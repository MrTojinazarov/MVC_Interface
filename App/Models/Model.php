<?php

namespace App\Models;

use App\Models\ModelAbstract;
use PDO;

class Model extends ModelAbstract
{
    protected static $table;

    public function getAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $query = $this->connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function CheckUserExists($data)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE login = :login";
        $query = $this->connect()->prepare($sql);
        $query->bindParam(':login', $data['login']);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function createUser($data)
    {

        if ($data['password']) {
            $data['password'] = md5($data['password']);
        }

        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO " . static::$table . " ({$keys}) VALUES ({$values})";
        $stmt = $this->connect()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            return self::CheckUserExists($data);
        }
    }

    public function getUserByLogin($data)
    {

        if ($data['password']) {
            $data['password'] = md5($data['password']);
        }

        $sql = "SELECT * FROM " . static::$table . " WHERE login = :login AND password = :password";
        $query = $this->connect()->prepare($sql);
        $query->bindParam(':login', $data['login']);
        $query->bindParam(':password', $data['password']);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . static::$table . " 
                  SET name = :name, author = :author, genre = :genre, title = :title, photo = :photo 
                  WHERE id = :id";
    
        $stmt = $this->connect()->prepare($query);
    
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':author', $data['author']);
        $stmt->bindParam(':genre', $data['genre']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':photo', $data['photo']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
    public function create($data)
    {
        $sql = "INSERT INTO " . static::$table . " (name, author, genre, title, photo) 
                    VALUES (:name, :author, :genre, :title, :photo)";
    
        $stmt = $this->connect()->prepare($sql);
    
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':author', $data['author']);
        $stmt->bindParam(':genre', $data['genre']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':photo', $data['img']);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function delete($id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showOne($id)
    {

        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $query = $this->connect()->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
