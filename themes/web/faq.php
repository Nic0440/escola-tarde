<?php
   //$this->layout("_theme");
?>

<?php

echo "Perguntas Mais Frequentes! 2<br>";

//var_dump($faqs);
if(!empty($faqs)){
    foreach ($faqs as $faq){
       echo "<div><span>{$faq->question}</span>
        <span>{$faq->answer}</span></div>";
    }
}


