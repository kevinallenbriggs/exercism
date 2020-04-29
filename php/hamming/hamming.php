<?php

function distance(string $controlStrand, string $compareStrand): int
{
    if (strlen($controlStrand) != strlen($compareStrand)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    return count(
        array_diff_assoc(
            str_split($controlStrand),
            str_split($compareStrand)
        )
    );
}
