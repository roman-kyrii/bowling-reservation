<?php

namespace Bowling;

/**
 * Class Reservation defines reservation which can be made for alley
 * @copyright 2013 by MEV, LLC
 * @author Roman Kyrii <roman.kyrii@mev.com>
 * @package Bowling
 */
class Reservation
{
    /**
     * @var $reserver - person who made reservation
     */
    private $reserver;

    /**
     * @var $from - date for which reservation was made
     */
    private $from;

    /**
     * @var $time - reserved time
     */
    private $time;

    /**
     * @var array $players - players who will play bowling at reserved date
     */
    private $players = array();

    /**
     * @param $reserver
     * @param $from
     * @param $time
     * @param array $players
     */
    public function __construct($reserver, $from, $time, array $players = null)
    {
        $this->reserver = $reserver;
        $this->from = $from;
        $this->time = $time;
        $this->players = $players;
    }

    /**
     * @return string - person who made reservation
     */
    public function getReserver()
    {
        return $this->reserver;
    }

    /**
     * @return int - date for which reservation was made
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return array - players who will play bowling at reserved date
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @return int - reserved time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string - string representation of reservation object
     */
    public function __toString()
    {
        $result = "Reserver: $this->reserver; " .
                  "From: $this->from; " .
                  "Time: $this->time; ";

        if (isset($this->players)) {
            $players = '';

            foreach ($this->players as $player) {
                $players .= $player;
            }

            $result .= $players;
        }

        return $result;
    }


}
