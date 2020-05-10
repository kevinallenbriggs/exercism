<?php

/**
 * Determines if a sentence is a pangram.
 *
 * A pangram is a sentence using every letter of the alphabet at least once.
 *
 * @param string $sentence Consists of ASCII letters a to z, inclusive, and is
 *                         case insensitive. Input may contain non-ASCII
 *                         symbols, but it is only necessary to check whether
 *                         each letter in the English alphabet is present.
 * @return boolean
 */
function isPangram(string $sentence): bool
{
    // empty strings can't be pangrams
    if (empty($sentence)) {
        return false;
    }

    // define the characters to look for
    $characterSet = implode('', range('a', 'z'));

    // define a place to store matched characters
    $matchedCharacters = [];

    // strip the sentence of all unneeded characters
    $sentence = preg_replace("/[^{$characterSet}]/i", '', $sentence);

    // loop through the character set
    foreach (str_split($characterSet) as $character) {
        $matches = [];

        // check if the sentence contains the character
        if (preg_match("/[{$character}]/i", $sentence, $matches)) {

            // ensure the match hasn't already been recorded
            if (! in_array($matches[0], $matchedCharacters, true)) {

                // record the match
                $matchedCharacters[] = strtolower($matches[0]);
            }
        }
    }

    // is there a match for every character in the character set?
    return implode('', $matchedCharacters) === $characterSet;
}
