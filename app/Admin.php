<?php

namespace App;

class Admin
{
    public static function inputValue($fieldName)
    {
        $row = session()->get('adminRow');

        $exploded = explode('->', $fieldName);

        if (count($exploded) == 1) {
            $fieldValue = $row->{$fieldName};
        } else {
            $fieldValue = $row->{$exploded[0]};
            unset($exploded[0]);
            foreach ($exploded as $val) {
                $fieldValue = @$fieldValue->{$val};
            }
        }

        return ($row) ? $fieldValue : old($fieldName);
    }
}
