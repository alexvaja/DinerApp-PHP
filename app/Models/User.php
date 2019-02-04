<?php
namespace App\Models;

use Framework\Model;

class User extends Model
{
    protected $table = 'users';

    public function getAllEmailsFromDB()
    {
        $pdo = $this->newDbCon();
        $sql = "SELECT * FROM $this->table";
        $stmt = $pdo -> prepare($sql);
        return $stmt->fetchAll();
    }

    public function registerUser($first_name, $second_name, $email, $password)
    {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        Model::new(["second_name" => $second_name, "first_name" => $first_name, "email" => $email, "password" => $hashed_pass]);
    }

//    public function searchForUserAtLogin(string $email, $password)
//    {
//        $pdo = $this->newDbCon();
//        //$sql = "SELECT FROM" $this->table(email);
//        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . email . '=?' . paroa . '=?';
//        $stmt = $pdo -> prepare($sql);
//        $stmt -> execute([$email, $password]);
//
//        return $stmt->fetch();
//    }


    function searchForUserAtLogin (string $email, $password){
        $user = $this->getRowByField("email", $email);
        if ($user != null && password_verify($password, $user->password)){
            return true;
        }
        return false;
    }

    public function getRowByField($field, $data){
        $db = $this->newDbCon();
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $field . '=?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$data]);
        return $stmt->fetch();
    }
}
