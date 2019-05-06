<?php
namespace App\Inject;

class Tag {
    public function getTag()
    {
        return \App\Tag::all();
    }
}