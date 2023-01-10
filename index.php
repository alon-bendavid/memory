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


$cards = [];
for ($i = 1; $i <= 12; $i++) {
    $cards['card' . $i] = new Card('<img src="..\media\frontPic.jpg" alt="Card image">', $i);
}
foreach ($cards as $x) {
    // print_r($x);
}
echo "The id of the card is : " . $cards['card9']->getId();
// $cards['card3']->displayPic();
// print_r($cards['card1']);
// print_r($cards['card2']);


?>

<body>
    <!-- <img src="/media/frontPic.jpg" alt=""> -->
    <!-- <div class="     ">

        <div class="thecard">

            <div class="thefront">
                <h1>Front of Card</h1>
                <p>This is the front of the card. It contains important information. Please see overleaf for more details.</p>
            </div>

            <div class="theback">
                <h1>Back of Card</h1>
                <p>Your use of this site is subject to the terms and conditions governing this and all transactions.</p>
                <button>Submit</button>
            </div>

        </div>
    </div> -->

</body>

</html>