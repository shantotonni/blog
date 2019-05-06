<?php
namespace App\Inject;

class Category {
    public function getCategory()
    {
        return \App\Category::all();
    }
}