<?php
/***********************************************************************************************************************
 *
 * Written by kolomiets <kolomiets.dev@gmail.com>
 * Date: 6/3/14
 * Time: 6:16 PM
 *
 **********************************************************************************************************************/

class Author
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $nick;

    /**
     * @param int $id
     */
    public function setId ($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param string $nick
     */
    public function setNick ($nick)
    {
        $this->nick = $nick;
    }

    /**
     * @return string
     */
    public function getNick ()
    {
        return $this->nick;
    }
} 