<?php

namespace Hiberus\DeLaCuesta\Plugin\Marks;
use \Hiberus\DeLaCuesta\Model\Notas;

class MarksPlugin{

    public function afterGetName(Notas $subject, $result){
        $result = $result->getMark();

        return $result;

    }

}
