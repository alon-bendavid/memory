<?php
require_once("header.php");


$card = new Card('<img src="..\media\frontPic.jpg" alt="Card image">');
for ($pairs = 0; $pairs < 3 * 2; $pairs++) {
    if ($pairs == 3) {

        $card->display();
    } else {
        $card->display();
    }
}
$card->displayBack();

?>

<body>
    <!-- <img src="/media/frontPic.jpg" alt=""> -->

</body>

</html>