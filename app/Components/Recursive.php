<?php

namespace App\Components;

use App\Models\Category;

class Recursive
{
    private $category;
    private $htmlSelect = '';

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function categoryRecursive($parentId, $id = 0, $text = '')
    {
        foreach ($this->category as $value) {
            if ($value['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $value['id']){
                    $this->htmlSelect .= "<option value= '" . $value['id'] . "' selected>" . $text . $value['category_name_en'] . "</option>";
                }else{
                    $this->htmlSelect .= "<option value= '" . $value['id'] . "'>" . $text . $value['category_name_en'] . "</option>";
                }

                $this->categoryRecursive($parentId, $value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
