<?php

class Db{

    private $dsn = 'mysql:host=localhost;dbname=rent;charset=utf8';

    private $user = 'root';
    
    private $passwd = '';

    protected function connect(){

        try {

            $pdo = new PDO($this->dsn, $this->user, $this->passwd);

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $pdo;

        }catch (PDOException $e){

            die ('Connection Problem');

        }

    }

    function getUser(){

        if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){

            $username = $_COOKIE["username"];

            $password = $_COOKIE["password"];

            $sql_check_username = "SELECT * FROM `user` WHERE `Username` = ?";

            $statement_check_username = $this->connect()->prepare($sql_check_username);
    
            $statement_check_username->execute(array($username));

            $number_rows_check_username = $statement_check_username->rowCount();

            if($number_rows_check_username == 1){

                $data_array = $statement_check_username->fetch();

                $password_hash = $data_array["Password"];

               if (password_verify($password, $password_hash)){

                    $sql_check_lessor = "SELECT * FROM `lessor` WHERE `User` = ?";

                    $statement_check_lessor = $this->connect()->prepare($sql_check_lessor);
            
                    $statement_check_lessor->execute(array($username));

                    $number_rows_check_lessor = $statement_check_lessor->rowCount();

                    if ($number_rows_check_lessor === 1){

                        return 'Lessor';

                    }else {

                        return 'User';

                    }

                }else {

                    return false;

                }

            }else {

                /* UNSET COOKIE IF USERNAME NOT IN DB */

                setcookie("username", "", time() - 3600);

                setcookie("password", "", time() - 3600);

                return false;

            }

        }else {

            return false;

        }

    }

}