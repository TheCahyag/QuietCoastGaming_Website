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
    private $pathTo_threadFile, $title;

    // Strings
    private $postArray;

    /**
     * Thread constructor.
     * @param $data - array:
     *              0 -> $title
     *              1 -> $pathTo_threadFile
     * @param $firstPost
     */
    public function __construct($data, $firstPost){
        $this->title = $data[0];
        $this->pathTo_threadFile = $data[1];
        $this->postArray = new ArrayObject(array());
        $this->postArray->append($firstPost);
    }

    /**
     * @return Post - most recent post
     */
    public function getMostRecentPost(){
        $numOfPosts = count($this->postArray);
        return $this->postArray[$numOfPosts - 1];
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