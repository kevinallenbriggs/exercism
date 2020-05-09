<?php

function isPangram(string $sentence): bool
{
    $lettersToMatch = 'abcdefghijklmnopqrstuvwxyz';

    $matchedLetters = [];

    $sentence = preg_replace("/[^{$lettersToMatch}]/i", '', trim($sentence));

    if (empty($sentence)) {
        return false;
    }

    foreach (str_split($lettersToMatch) as $letter) {
        $matches = [];

        if (preg_match("/[{$letter}]/i", $sentence, $matches)) {
            if (! in_array($matches[0], $matchedLetters, true)) {
                $matchedLetters[] = strtolower($matches[0]);
            }
        }
    }

    return implode('', $matchedLetters) === $lettersToMatch;
}
