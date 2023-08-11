<?php

namespace Source\App;

use League\Plates\Engine;

class Adm
{
    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

}
