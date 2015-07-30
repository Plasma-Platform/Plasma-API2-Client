<?php
/***********************************************************************************************************************
 * @author: <kolomiets.dev@gmail.com> 
 **********************************************************************************************************************/

class Links
{
    /**
     * @var array
     */
    protected $links = array ();

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $finishDate;

    /**
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param array $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * @param string $finishDate
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }
}