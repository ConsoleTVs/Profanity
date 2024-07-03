<?php

/*
 * This file is part of consoletvs/profanity.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Profanity;

use ConsoleTVs\Profanity\Classes\Blocker;

/**
 * This is the profanity builder class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Builder
{
    /**
     * Return a new chart instance.
     *
     * @param string $type
     * @param string $library
     * @param array  $languages Language codes of the bad words that should be checked against.
     *                          Keep empty to check against all words.
     *                          Example: Passing ['en', 'de'] means that text is only checked against
     *                          English and German words from the dictionary.
     *
     * @return \ConsoleTVs\Profanity\Classes\Blocker
     */
    public static function blocker($text, $blocker = '****', $languages = [])
    {
        return new Blocker($text, $blocker, $languages);
    }
}
