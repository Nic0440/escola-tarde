<?php

namespace Source\Models;

use Source\Core\Connect;

class Faq
{
    private $id;
    private $question;
    private $answer;

    public function selectAll()
    {
        $stm = Connect::getInstance()->query("SELECT * FROM faqs");
        return $stm->fetchAll();
    }

}
