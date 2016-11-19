<?php
/**
 * File: Forum.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Meant to contain information pertinent to any given forum. And keeps track of
 * how many threads and posts are in the given forum.
 */
class Forum {
    private $pathFrom_root, $fileName, $pathTo_data, $pathTo_file;
    private $threadCount, $postCount;
    private $threadArray;

    /**
     * Forum constructor.
     * @param $fileName - name of the file associated with the forum (with extension)
     * @param $pathTo_data - path to forum folder containing threads and posts
     */
    public function __construct($fileName, $pathTo_data){
        $this->pathFrom_root = "forum/pages/";
        $this->pathTo_data = $pathTo_data;
        $this->pathTo_file = $this->pathFrom_root.$fileName;
        $this->fileName = $fileName;
        $blankArray = array();
        $this->threadArray = new ArrayObject($blankArray);
        $this->threadCount = 0;
        $this->postCount = 0;
    }


    public function createThread($name, $post){
        $thread = new Thread("", $post);

    }

    /**
     * appendThread todo
     * @param $thread - thread to append to a given forum
     */
    private function appendThread($thread){
        $this->threadArray->append($thread);
    }

    /**
     * validate resets count values to the actual value based on files
     * This function should eventually be removed, but it might be good for the start
     */
    public function validate(){
        $this->threadCount = $this->countThreadCount();
        $this->postCount = $this->countPostCount();
        /**
         * todo
         * thinking of returning bool to indicated whether there was any corrections that were
         * made, probably good
         */
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