<?php
/**
 * File: Thread.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */
class Thread{
    private $pathTo_threadFile, $title; // Strings
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
        $blankArray = array();
        $this->postArray = new ArrayObject($blankArray);
        $this->postArray->append($firstPost);
    }

    /**
     * @return int
     */
    public function getPostCount(){
        return $this->postArray->count();
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }


}