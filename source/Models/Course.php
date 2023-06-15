<?php

namespace Source\Models;

use Source\Core\Connect;

class Course
{

    public function selectAll()
    {
        $stm = Connect::getInstance()->query("SELECT * FROM courses");
        return $stm->fetchAll();
    }

    public function selectByCategory (string $category)
    {
        $query = "SELECT courses.name, price, abstract FROM courses 
         JOIN categories ON courses.category_id = categories.id 
         WHERE categories.name = '{$category}'";

        $stm = Connect::getInstance()->query($query);
        return $stm->fetchAll();
    }

}
