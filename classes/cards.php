<?php
class Card
{
    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function display()
    {
        echo '<div class="card">';
        echo $this->content;
        echo '</div>';
    }
}
