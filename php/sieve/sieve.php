<?php

function sieve(int $limit): array
{
    $primeNumbers = array_fill(2, $limit - 1, false);

    for ($i = 2, $multiple = $i; $i <= $limit; $i++, $multiple = $i) {
        if (isset($primeNumbers[$i]) && $primeNumbers[$i] == false) {
            $primeNumbers[$i] = true;

            do {
                unset($primeNumbers[$multiple += $i]);
            } while ($multiple <= $limit);
        }
    }

    return array_keys($primeNumbers);
}
