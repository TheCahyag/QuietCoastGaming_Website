<?php
/**
 * File: Forum.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Meant to contain information pertinent to any given forum. And keeps track of
 * how many threads and posts are in the given forum.
 */

include $_SERVER['DOCUMENT_ROOT']."/php/getNameForFile.php";

//namespace QuietCoastGaming\php;

/**
 * Class Forum
 * @package QuietCoastGaming\php
 */
class Forum {
    private $pathFrom_root, $name, $fileName, $pathTo_data, $pathTo_file;
    private $threadArray;
    private $nextThreadID;

    /**
     * Forum constructor.
     * @param $name - name of the forum
     */
    public function __construct($name){
        $this->pathFrom_root = "forum/pages/";
        $this->name = $name;
        $this->fileName = nameMe($name, '.php');
        $this->threadArray = new ArrayObject(array());
        $this->nextThreadID = 1;
    }

    /**
     * @param $data - array: (All strings)
     *              0 -> title (for thread)
     *              1 -> name of user (for post)
     *              2 -> date (for post)
     *              3 -> content (for post)
     *              4 -> dirToData
     */
    public function createThread($data){
        $post = new Post($data[1], $data[3], $data[2]);
        $arrayForThread = array($data[0], $data[4], $this->getNextThreadID());
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
     * @return mixed
     */
    public function getName(){
        return $this->name;
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
     * Returns the ID for the next thread and then iterators the ID count for the next call
     * @return string
     */
    public function getNextThreadID(){
        $ID = null;
        if ($this->nextThreadID < 10){
            $ID = str_pad($this->nextThreadID, 3, '0', STR_PAD_LEFT);
        } else if ($this->nextThreadID < 100){
            $ID = str_pad($this->nextThreadID, 2, '0', STR_PAD_LEFT);
        } else if ($this->nextThreadID < 1000){
            $ID = $this->nextThreadID;
        }
        $this->nextThreadID++;
        return $ID;
    }

    /**
     * @return string
     */
    public function peekAtNextThreadID(){
        $ID = null;
        if ($this->nextThreadID < 10){
            $ID = str_pad($this->nextThreadID, 3, '0', STR_PAD_LEFT);
        } else if ($this->nextThreadID < 100){
            $ID = str_pad($this->nextThreadID, 2, '0', STR_PAD_LEFT);
        } else if ($this->nextThreadID < 1000){
            $ID = $this->nextThreadID;
        }
        return $ID;
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