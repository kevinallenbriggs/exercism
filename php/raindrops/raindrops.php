<?php

function raindrops($number)
{
    $possibleSounds = [
        3 => "Pling",
        5 => "Plang",
        7 => "Plong",
    ];

    $sounds = "";

    foreach ($possibleSounds as $factor => $sound) {
        if ($number % $factor === 0) {
            $sounds .= $sound;
        }
    }

    return empty($sounds) ? "$number" : $sounds;
}
