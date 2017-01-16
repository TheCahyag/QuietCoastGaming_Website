<?php
/**
 * File: Thread.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */

//namespace QuietCoastGaming\php;

/**
 * Class Thread
 * @package QuietCoastGaming\php
 */
class Thread {
    private $pathTo_threadFile, $title; // Strings
    private $threadID; // String
    private $postArray;

    /**
     * Thread constructor.
     * @param $data - array:
     *              0 -> $title
     *              1 -> $pathTo_threadFile
     *              2 -> $threadID;
     * @param $firstPost
     */
    public function __construct($data, $firstPost){
        $this->title = $data[0];
        $this->pathTo_threadFile = $data[1];
        $this->threadID = $data[2];
        $this->postArray = new ArrayObject(array());
        $this->postArray->append($firstPost);
    }

    public function addPost($post){
        $this->postArray->append($post);
    }

    /**
     * @return Post - most recent post
     */
    public function getMostRecentPost(){
        $numOfPosts = count($this->postArray);
        return $this->postArray[$numOfPosts - 1];
    }

    /**
     * @return mixed
     */
    public function getThreadID(){
        return $this->threadID;
    }

    /**
     * @return ArrayObject
     */
    public function getPostArray(){
        return $this->postArray;
    }

    /**
     * @return int
     */
    public function getPostCount(){
        return count($this->postArray);
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * @return String - path to the file representing the given thread
     */
    public function getPathToThreadFile(){
        return $this->pathTo_threadFile;
    }
}