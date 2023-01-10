<?php
class Card
{
    public $id;
    private $conn;


    public function __construct($id)
    {
        $this->id = $id;
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=memory_game", "root", "");
        } catch (PDOException $fail) {
            echo $fail->getMessage();
        }

        return $this->conn;
    }
    // public function __toString()
    // {
    //     return 'This is MyClass object';
    // }



    public function displayBack()
    {

        $query = "SELECT backPic FROM cards ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<button class="card" >';
            // echo '<img src="' . $row['backPic'] . '">';
            echo '<img class="images" src="data:image/jpeg;base64,' . base64_encode($row['backPic']) . '"/>';
            // echo $row['id']; 


            echo '</button>';
        }
    }
    public function frontPic()
    {
        echo '<div class="card" >';
        // echo '<img src="' . $row['backPic'] . '">';
        echo '<img src="..\media\frontPic.jpg" alt="Card image">';
        // echo $row['id']; 


        echo '</div>';
    }
    public function backPic()
    {
        $query = "SELECT backPic FROM cards WHERE id =$this->id";
        $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(':id', $id);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="card" >';
            echo '<img class="images" src="data:image/jpeg;base64,' . base64_encode($row['backPic']) . '"/>';
            echo '</div>';
        }
    }
    public function getId()
    {
        return $this->id;
    }
}
