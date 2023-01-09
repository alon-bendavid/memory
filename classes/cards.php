<?php
class Card
{
    public $content;
    private $conn;


    public function __construct($content)
    {
        $this->content = $content;
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=memory_game", "root", "");
        } catch (PDOException $fail) {
            echo $fail->getMessage();
        }

        return $this->conn;
    }

    public function display()
    {
        echo '<button class="card">';
        echo $this->content;
        echo '</button>';
    }
    public function displayBack()
    {

        $query = "SELECT backPic FROM cards ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<button class="card">';
            // echo '<img src="' . $row['backPic'] . '">';
            echo '<img class="images" src="data:image/jpeg;base64,' . base64_encode($row['backPic']) . '"/>';


            echo '</button>';
        }
    }
    public function checkConnection()
    {
    }
}
