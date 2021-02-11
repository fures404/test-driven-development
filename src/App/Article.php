<?php

namespace App;

class Article
{
    public $title;

    public function getSlug()
    {
        $slug = $this->title;

        $slug = preg_replace('/\s+/ ','_',$slug); //str_replace
        /*
         * \s --> any whitespace character including spaces, newslines and tabs
         * + --> regular expression which will match one or more adjacent
         */

        $slug = trim($slug, "_"); //trim for remove any leading our trailing underscore characters

        return $slug;
    }
}
