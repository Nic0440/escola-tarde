<?php

namespace Source\Models;

use Source\Core\Connect;

class Category
{

    public function selectAll()
    {
        $stm = Connect::getInstance()->query("SELECT * FROM categories");
        return $stm->fetchAll();
    }

}
