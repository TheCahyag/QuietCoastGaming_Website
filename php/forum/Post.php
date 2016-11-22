<?php
/**
 * File: Post.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

//namespace QuietCoastGaming\php;

include ("../strip-tags-content.php"); // Striping HTML tags from given text

/**
 * Class Post
 * @package QuietCoastGaming\php
 */
class Post {
    private $author, $content; // Strings
    private $date; // String

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
     * @return mixed
     */
    public function getAuthor(){
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getContent(){
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDate(){
        return $this->date;
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