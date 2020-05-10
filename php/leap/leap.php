<?php

/**
 * Given a year, determine if it is a leap year.
 *
 * A leap year in the Gregorian calendar occurs:
 * - on every year that is evenly divisible by 4
 * - except every year that is evenly divisible by 100
 * - unless the year is also evenly divisible by 400
 *
 * @param int $year
 * @return boolean
 */
function isLeap(int $year): bool
{
    if ($year % 4 === 0) {
        if ($year % 100 === 0) {
            if ($year % 400 === 0) {
                return true;
            }

            return false;
        }

        return true;
    }

    return false;
}
