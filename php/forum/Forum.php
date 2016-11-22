<?php
/**
 * File: Forum.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Meant to contain information pertinent to any given forum. And keeps track of
 * how many threads and posts are in the given forum.
 */

include "../getNameForFile.php";

//namespace QuietCoastGaming\php;

/**
 * Class Forum
 * @package QuietCoastGaming\php
 */
class Forum {
    private $pathFrom_root, $fileName, $pathTo_data, $pathTo_file;
    private $threadArray;

    /**
     * Forum constructor.
     * @param $fileName - name of the file associated with the forum (with extension)
     */
    public function __construct($name){
        $this->pathFrom_root = "forum/pages/";
        $this->fileName = nameMe($name, '.php');
        $blankArray = array();
        $this->threadArray = new ArrayObject($blankArray);
    }

    /**
     * @param $data - array: (All strings)
     *              0 -> title (for thread)
     *              1 -> name of user (for post)
     *              2 -> date (for post)
     *              3 -> content (for post)
     */
    public function createThread($data){
        $post = new Post($data[1], $data[3], $data[2]);
        $arrayForThread = array($data[0], "");
        $thread = new Thread($arrayForThread, $post);
        $this->threadArray->append($thread);
    }

    /**
     * @return String
     */
    public function getFileName(){
        return $this->fileName;
    }

    /**
     * @return ArrayObject
     */
    public function getThreadArray(){
        return $this->threadArray;
    }

    /**
     * @return string
     */
    public function getPathFromRoot(){
        return $this->pathFrom_root;
    }

    /**
     * Count how many threads are present in the file system, each folder under the forum/data/FORUM_NAME
     * directory represents a thread
     * @return int
     */
    public function countThreadCount(){
        return $this->threadArray->count();
    }

    /**
     * Count how many posts are present in all threads under this forum. This is represented by
     * the number of files under all folders under the folder containing the entire forum thread.
     * @return int
     */
    public function countPostCount(){
        $total = 0;
        foreach ($this->threadArray->getIterator() as $thread){
            $total += $thread->getPostCount();
        }
        return $total;
    }
}