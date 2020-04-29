<?php

function meetup_day(int $year, int $month, string $descriptor, string $dayOfWeek)
{
    $month = DateTime::createFromFormat('m', "$month")->format('F');
    $year = DateTime::createFromFormat('Y', "$year")->format('Y');

    if ($descriptor == "teenth") {
        $possibleDates = [
            new DateTime("second $dayOfWeek of $month $year"),
            new DateTime("third $dayOfWeek of $month $year")
        ];

        foreach ($possibleDates as $date) {
            if (in_array($date->format('j'), [13, 14, 15, 16, 17, 18, 19])) {
                return $date;
            }
        }
    }

    return new DateTime("$descriptor $dayOfWeek of $month $year");
}
