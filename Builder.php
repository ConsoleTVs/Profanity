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
     *
     * @return \ConsoleTVs\Profanity\Classes\Blocker
     */
    public static function blocker($text, $blocker = '****')
    {
        return new Blocker($text, $blocker);
    }
}
