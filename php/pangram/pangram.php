<?php

define('LETTERS_TO_MATCH', 'abcdefghijklmnopqrstuvwxyz');

function isPangram(string $sentence): bool
{
    if (empty($sentence = trim($sentence))) {
        return false;
    }

    $matchedLetters = [];

    foreach (str_split(LETTERS_TO_MATCH) as $letter) {
        $pattern = sprintf('/[%s]/i', $letter);
        $matches = [];

        if (preg_match($pattern, $sentence, $matches)) {
            if (! in_array($matches[0], $matchedLetters, true)) {
                $matchedLetters[] = $matches[0];
            }
        }
    }
    return implode('', $matchedLetters) === LETTERS_TO_MATCH;
}
