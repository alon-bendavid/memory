<?php
class User
{
    private $id;
    public $login;
    public $score;

    private $conn;


    // database connection----------------------------------------------------------------------------------------------------------------------------
    public  function __construct($login)
    {
        $this->login = $login;


        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=classes", "root", "");
        } catch (PDOException $fail) {
            echo $fail->getMessage();
        }

        return $this->conn;
    }


    //register the acount into the database ----------------------------------------------------------------
    public function register($login)
    {
        // check if username already exist
        $stmt = $this->conn->prepare("SELECT id FROM utilisateurs WHERE login = ?");
        $stmt->bindValue(1, $login, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return "username already exist";
        }




        // Insert new user
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login) VALUES (?)");
        $stmt->bindValue(1, $login, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "username created";
        } else {
            return "error";
        }
    }



    //login user--------------------------------------------------------------------------------------------------------------------------##########
    public function login($login)
    {
        $stmt = $this->conn->prepare("SELECT id FROM utilisateurs WHERE login = ?");
        $stmt->bindValue(1, $login, PDO::PARAM_STR);
        $stmt->execute();

        $stmt->fetch();
        if ($stmt != null) {
            $_SESSION['user'] = $this->login;
            return true;
        } else {
            return false;
        }
    }


    // disconnect user---------------------------------------------------------------------------------------------------------------------
    public function disconnect()
    {
        session_unset();
        session_destroy();
    }

    // delete current user-----------------------------------------------------------------------------------------------------------------
    public function delete()
    {
        $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE login = ?");
        $stmt->bindValue(1, $this->login, PDO::PARAM_STR);
        $stmt->execute();
        session_unset();
        session_destroy();
    }



    // check if user is connected------------------------------------------------------------------------------------------------------------
    public function isConnected()
    {
        if (isset($_SESSION["login"])) {
            return true;
        } else {
            return false;
        }
    }
    // fetch user info and present it as a table--------------------------------------------------------------------------------------------------
    public function getAllInfos()
    {
        echo "<table>";
        echo "<tr><th>ID</th><td>" . $this->id . "</td></tr>";
        echo "<tr><th>Login</th><td>" . $this->login . "</td></tr>";

        echo "</table>";
    }
    //return specific user information--------------------------------------------------------------------------------------------------------
    // username--------------------------
    public function getLogin()
    {
        return $this->login;
    }
}
// $user = new Userpdo(null, "pdo test", "pdo@gmail.com", "pdo", "newpdo", "1234");
// $user->register("pdo test", "pdo@gmail.com", "pdo", "newpdo", "1234");
