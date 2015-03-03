<?php

class ArticleFactory {

    /**
     * @param string $csvFile
     */
    public function __construct($csvFile) {
        $this->handle = fopen($csvFile, "r");
    }

    /**
     * @param $sortByColumn
     *
     * @return ArticleFactory
     */
    public function sortBy($sortByColumn) {
        $this->sortByColumn = $sortByColumn;
        return $this;
    }

    /**
     * Sort string values
     *
     * @param Article $a
     * @param Article $b
     *
     * @return int
     */
    function stringcmp($a, $b) {
        return strcmp($a->{$this->sortByColumn},$b->{$this->sortByColumn});
    }

    /**
     * Sort numeric values
     * @param Article $a
     * @param Article $b
     *
     * @return bool
     */
    function numbercmp($a, $b) {
        return doubleval($a->{$this->sortByColumn}) > doubleval($b->{$this->sortByColumn});
    }

    /**
     * @return Article[]
     */
    public function get() {
        if (!$this->handle)
            return false;

        $resultData = array();
        while (($data = fgetcsv($this->handle, 0, "\t")) !== FALSE) {
            $resultData[] = new Article($data[0],$data[1],$data[2],$data[3]);
        }

        switch($this->sortByColumn) {
            case 'id':
            case 'price':
                usort($resultData, array(__CLASS__, "numbercmp"));
                break;
            case 'title':
            case 'description':
                usort($resultData, array(__CLASS__, "stringcmp"));
        }

        return $resultData;
    }

    public function __destruct() {
        fclose($this->handle);
    }

    private $handle;
    private $sortByColumn;
}