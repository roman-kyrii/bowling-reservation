<?php

namespace Bowling;

require '../vendor/autoload.php';

use Bowling\Exceptions;

/**
 * Class Alley defines Alley entity
 * @copyright 2013 by MEV, LLC
 * @author Roman Kyrii <roman.kyrii@mev.com>
 * @package Bowling
 */
class Alley
{
    /**
     * defines maximum players per alley
     */
    const MAX_NUMBER_OF_PLAYERS = 8;

    /**
     * @var array stores reservations for current alley
     */
    private $reservations = array();

    /**
     * creates new reservation and adds it to the $reservations
     *
     * @param $reserver - name of a person who makes reservation
     * @param $from - date of reservation
     * @param $time - reservation time
     * @param array $players - names of players
     * @throws Exceptions\IllegalNumberOfPlayersException
     * @throws Exceptions\TimeIsReservedException
     */
    public function makeReservation($reserver, $from, $time, array $players = null)
    {
        if (isset($players) and (count($players) > self::MAX_NUMBER_OF_PLAYERS)) {
            throw new Exceptions\IllegalNumberOfPlayersException("Only ".self::MAX_NUMBER_OF_PLAYERS." players can play on the valley");
        }

        foreach ($this->reservations as $reservation) {
            if ($reservation instanceof Reservation) {
                if ($reservation->getFrom() == $from) {
                    throw new Exceptions\TimeIsReservedException("This time is reserved");
                }
            }
        }

        $this->reservations[] = new Reservation($reserver, $from, $time, $players);
    }

    /**
     * cancels reservation which is identified by reserver and date of reservation
     * @param $reserver
     * @param $from
     * @return int - if reservation was found and canceled returns 1, else -1
     */
    public function cancelReservation($reserver, $from)
    {
        foreach ($this->reservations as $key => $reservation) {
            if ($reservation instanceof Reservation) {
                if ($reservation->getReserver() == $reserver and $reservation->getFrom() == $from) {
                    unset($this->reservations[$key]);
                    return 1;
                }
            }
        }

        return -1;
    }

    /**
     * @return string - string representation of all reservations
     */
    public function __toString()
    {
        $result = '';

        if (isset($this->reservations)) {
            foreach ($this->reservations as $reservation) {
                $result .= $reservation . "\n";
            }
        }

        return $result;
    }
}
