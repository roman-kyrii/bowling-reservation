<?php

namespace Bowling;

require '../vendor/autoload.php';

use Bowling;

/**
 * Class BowlingClub defines bowling club
 * @copyright 2013 by MEV, LLC
 * @author Roman Kyrii <roman.kyrii@mev.com>
 * @package Bowling
 */
class BowlingClub
{
    /**
     * @var array $alleys - stores alleys of current bowling club
     */
    private $alleys = array();

    /**
     * Constructor
     * @param $numberOfAlleys - number of alleys for bowling club
     */
    public function __construct($numberOfAlleys)
    {
        for ($i = 0; $i < $numberOfAlleys; $i++) {
            $this->alleys[] = new Alley();
        }
    }

    /**
     * Delegates creation of reservation to specified by index alley
     * @param int $alleyIndex - index of club alley
     * @param string $reserver - name of person who make reservation
     * @param $reserveFrom - reservation date
     * @param $reserveTime - reservation time
     */
    public function makeReservation($alleyIndex, $reserver, $reserveFrom, $reserveTime)
    {
        if (isset($this->alleys[$alleyIndex]))
            if($this->alleys[$alleyIndex] instanceof Bowling\Alley) {
            try {
                $this->alleys[$alleyIndex]->makeReservation($reserver, $reserveFrom, $reserveTime);
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

    /**
     * @return string - string representation of Bowling Club object
     */
    public function __toString()
    {
        $result = '';

        foreach ($this->alleys as $key => $alley) {
            if ($alley instanceof Alley) {
                $result .= "alley [$key]: $alley \n";
            }
        }

        return $result;
    }

}
