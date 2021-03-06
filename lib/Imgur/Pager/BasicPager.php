<?php

namespace Imgur\Pager;

/**
 * Basic Pager.
 *
 * @author Adrian Ghiuta <adrian.ghiuta@gmail.com>
 */
class BasicPager implements PagerInterface
{
    private $page;

    private $resultsPerPage;

    public function __construct($page = 1, $resultsPerPage = 10)
    {
        if (!empty($page)) {
            $this->setPage($page);
        }

        if (!empty($resultsPerPage)) {
            $this->setResultsPerPage($resultsPerPage);
        }

        return $this;
    }

    /**
     * Get the page number to be retrieved.
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Get the number of results per page.
     *
     * @return int
     */
    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

    /**
     * Set the page number to be retrieved.
     *
     * @param int $page
     *
     * @return \Imgur\Pager\BasicPager
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Set the number of results per page.
     *
     * @param int $resultsPerPage
     *
     * @return \Imgur\Pager\BasicPager
     */
    public function setResultsPerPage($resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;

        return $this;
    }
}
