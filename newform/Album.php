<?php

class Album
{
    public $title = null;
    public $cover_image = null;
    public $author = null;
    public $tracks = [];
    public $year_of_release = null;

    public function __construct($title = null, $year = null)
    {
        $this->title = $title;
        $this->year_of_release = $year;
    }

    public function setAuthor(Author $author)
    {
        $this->author = $author;
    }

    public function addTrack(Track $track)
    {
        $this->tracks[] = $track;
    }

    public function setCoverImage($image_url)
    {
        $this->cover_image = $image_url;
    }

    public function getNrOfTracks()
    {
        return count($this->tracks);
    }

    public function getTitle()
    {
        return $this->title . ' ('.$this->year_of_release .')';
    }

    public function getTitleOfFirstTrack()
    {
        // if ($this->getNrOfTracks() == 0) {
        //     throw new Exception('There are no tracks in the album');
        // }

        if ($this->getNrOfTracks() > 0) {
            return $this->tracks[0]->title;
        } else {
            return null;
        }
    }
}