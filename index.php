<?php
require_once("header.php");


// for ($pairs = 0; $pairs < 3 * 2; $pairs++) {
//     if ($pairs == 3) {

//         $card->display();
//     } else {
//         $card->display();
//     }
// }
// $card->displayBack();
// $card->listenClick();

// $cardList = array();
// for ($n = 1; $n <= 12; $n++) {
//     // $cardList[] = array('card' . $n);
//     array_push($cardList, 'card' . $n);
// }
// foreach ($cardList as $x) {
//     print_r($x);
// }

// var_dump($card);
// for ($i = 1; $i <= 12; $i++) {
//     $objectName = 'card' . $i;
//     $objectName = new Card('<img src="..\media\frontPic.jpg" alt="Card image">');
// }
// echo $card1;

//create the card objects, chnage the middle value to chnage the paris presented
// $cards = [];
// for ($i = 1; $i <= 12; $i++) {
//     array_push($cards, new Card($i));
// }

$cards = [];
for ($i = 1; $i <= 12; $i++) {
    $cards['card' . $i] = new Card($i);
    $cards['card' . ($i + 12)] = new Card($i);
}



?>


<body>
    <?php //    var_dump($cards);   
    ?>
    <div class="board">
        <?php
        // displaying the board
        var_dump($cards);
        shuffle($cards);
        foreach ($cards as $a) {

            // $a->frontPic();
            // print_r($a);
            // if (isset($_POST[$a . $this->id])) {
            //     echo "lol";
            // }

            $a->backPic();

            // echo $a->content;
            // print_r($x);
        }
        shuffle($cards);

        foreach ($cards as $b) {
            // $b->backPic();
            // $b->frontPic();
        }
        ?>
    </div>


</body>

</html>