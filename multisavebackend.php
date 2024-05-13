<?php 
class database{
    function opencon(){
        return new PDO('mysql:host=localhost; dbname=phpoop_221','root','');
    }
    function check($username, $password){
        $con = $this->opencon();
        $query = "SELECT * from users WHERE user_name='".$username."' && user_pass='".$password."'";
        return $con->query($query)->fetch();
    }
 
    function signupUser($username, $password, $firstname, $lastname, $birthday, $sex) {
        $con = $this->opencon();
       
        $query = $con->prepare("SELECT user_name FROM users WHERE user_name = ?");
        $query->execute([$username]);
        $existingUser =  $query->fetch();
 
        if($existingUser){
            return false;
        }
        $con->prepare("INSERT INTO users (user_name, user_pass, first_name, last_name, birthday, sex) VALUES (?,?,?,?,?,?)")
                ->execute([$username, $password, $firstname, $lastname, $birthday, $sex]);
        return $con->lastInsertId();
    }
   
    function insertAddress($user_id, $street, $barangay, $city, $province) {
        $con = $this->opencon();
       
        return $con->prepare("INSERT INTO users_address(user_id, user_street, user_barangay, user_city, user_province) VALUES (?, ?, ?, ?, ?)")->execute(array($user_id, $street, $barangay, $city, $province));
       
    } 
}
?>
