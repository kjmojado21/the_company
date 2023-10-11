<?php 


include 'Connection.php';

// inheritance 

class User extends Connection {
                            // $_POST
    public function signUp($request){
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $hashed_password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name,last_name,username,password) VALUES ('$firstname','$lastname','$username','$hashed_password')";

        if($this->conn->query($sql)){
            header('location: ../sign-in.php');
            exit;
        }else{
            die("Error: ".$this->conn->error);
        }
    }

    public function signIn($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows == 1){
                $user = $result->fetch_assoc();

                if(password_verify($password,$user['password'])){
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['full_name'] = $user['first_name']." ".$user['last_name'];
                    $_SESSION['username'] = $user['username'];

                    header('location: ../views/dashboard.php');
                    exit;
                }else{
                    die("Error: Incorrect Password ".$this->conn->error);
                }

            }else{
                die('ERROR: Username does not match'.$this->conn->error);
            }
        }else{
            die('ERROR: '.$this->conn->error);
        }
    }

    public function displayUsers(){
        $sql = "SELECT * FROM users";
        
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("ERROR: ".$this->conn->error);
        }
    }

}