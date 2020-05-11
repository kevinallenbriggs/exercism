<?php

/**
 * Given a phrase, count the occurrences of each word in that phrase.
 *
 * @param string $phrase
 * @return array
 */
function wordCount(string $phrase): array
{
    // split the phrase into individual words
    $words = preg_split(
        '/[\s]+/',      // split by whitespace
        preg_replace('/[^a-z0-9\s?]/', '', strtolower($phrase)), // sanitize
        NULL,   // no limit
        PREG_SPLIT_NO_EMPTY     // don't return empty words
    );

    return array_count_values($words);  // count 'em up
}
