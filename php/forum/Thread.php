<?php
/**
 * File: Thread.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 */
class Thread{
    //private $whoStarted; //Strings
    private $pathTo_threadFile;
    private $mostRecentPost, $firstPost; // Post objects
    private $numOfPosts;

    /**
     * Thread constructor.
     * @param $pathTo_threadFile
     * @param $firstPost
     */
    public function __construct($pathTo_threadFile, $firstPost){
        $this->pathTo_threadFile = $pathTo_threadFile;
        $this->firstPost = $firstPost;
        $this->mostRecentPost = $firstPost;
        $this->numOfPosts = 1;
    }




}