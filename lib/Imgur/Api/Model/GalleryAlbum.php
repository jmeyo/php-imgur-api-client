<?php

namespace Imgur\Api\Model;

/**
 * Model for Gallery Album.
 *
 * @link https://api.imgur.com/models/gallery_album
 *
 * @author Adrian Ghiuta <adrian.ghiuta@gmail.com>
 */
class GalleryAlbum extends Album
{
    /**
     * Upvotes for the image.
     *
     * @var int
     */
    private $ups;

    /**
     * Number of downvotes for the image.
     *
     * @var int
     */
    private $downs;

    /**
     * Imgur popularity score.
     *
     * @var int
     */
    private $score;

    /**
     * If it's an album or not.
     *
     * @var bool
     */
    private $isAlbum;

    /**
     * The current user's vote on the album. null if not signed in or if the user hasn't voted on it.
     *
     * @var string
     */
    private $vote;

    /**
     * Build the GalleryImage object based on an array.
     *
     * @param array $parameters
     *
     * @return \Imgur\Api\Model\GalleryImage
     */
    public function __construct($parameters)
    {
        parent::__construct($parameters);

        $this->setUps($parameters['ups'])
             ->setDowns($parameters['downs'])
             ->setScore($parameters['score'])
             ->setIsAlbum($parameters['is_album'])
             ->setVote($parameters['vote']);

        return $this;
    }

    /**
     * Upvotes for the album.
     *
     * @param int $ups
     *
     * @return \Imgur\Api\Model\GalleryAlbum
     */
    public function setUps($ups)
    {
        $this->ups = $ups;

        return $this;
    }

    /**
     * Upvotes for the album.
     *
     * @return int $ups
     */
    public function getUps()
    {
        return $this->ups;
    }

    /**
     * Downvotes for the album.
     *
     * @param int $downs
     *
     * @return \Imgur\Api\Model\GalleryAlbum
     */
    public function setDowns($downs)
    {
        $this->downs = $downs;

        return $this;
    }

    /**
     * Downvotes for the album.
     *
     * @return int $downs
     */
    public function getDowns()
    {
        return $this->downs;
    }

    /**
     * Imgur popularity score.
     *
     * @param int $score
     *
     * @return \Imgur\Api\Model\GalleryAlbum
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Imgur popularity score.
     *
     * @return int $score
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * If it's an album or not.
     *
     * @param bool $isAlbum
     *
     * @return \Imgur\Api\Model\GalleryAlbum
     */
    public function setIsAlbum($isAlbum)
    {
        $this->isAlbum = $isAlbum;

        return $this;
    }

    /**
     * If it's an album or not.
     *
     * @return bool $isAlbum
     */
    public function getIsAlbum()
    {
        return $this->isAlbum;
    }

    /**
     * The current user's vote on the album. null if not signed in or if the user hasn't voted on it.
     *
     * @return string
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * The current user's vote on the album. null if not signed in or if the user hasn't voted on it.
     *
     * @param string $vote
     *
     * @return \Imgur\Api\Model\GalleryAlbum
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }
}
