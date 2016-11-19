<?php

include ("../strip-tags-content.php"); // Striping HTML tags from given text

/**
 * File: Post.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */
class Post{
    private $author, $content; // Strings
    private $date; // int?

    /**
     * Post constructor.
     * @param $author - author of post
     * @param $content - content of the post
     * @param $date
     */
    public function __construct($author, $content, $date){
        $this->author = $author;
        $this->content = $this->parseContent($content);
        $this->date = $date;
    }

    /**
     * parseContent is meant to take out anything other then normal text.
     * This includes the following html tags: <b><i><u><s><strike>
     * @param $content
     * @return mixed
     */
    public function parseContent($content){
        return strip_tags_content($content, "<b><i><u><s><strike>");
    }
}