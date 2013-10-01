<?php

require '../vendor/autoload.php';

use Bowling\BowlingClub;

$bowlingClub = new BowlingClub(3);

$reserver = 'Me';
$reserveFrom = time();
$reservedTime = 30;

$bowlingClub->makeReservation(0, $reserver, $reserveFrom, $reservedTime);

$bowlingClub->makeReservation(0, 'Jack', time() + 1000, 30);

echo $bowlingClub;
