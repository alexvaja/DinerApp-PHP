<?php
namespace App\Models;

use Framework\Model;

class User extends Model
{
    protected $table = 'users';

    public function registerUser(string $first_name, $second_name, $email, $pass) : bool
    {
        $pdo = $this->newDbCon();
        $sql = "INSERT INTO $this->table (first_name, second_name, email, password) VALUES(?, ?, ?, ?)";
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$first_name, $second_name, $email, $password]);
        return true;
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
