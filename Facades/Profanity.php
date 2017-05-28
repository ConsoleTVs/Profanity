<?php

/*
 * This file is part of consoletvs/profanity.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Profanity\Facades;

use ConsoleTVs\Profanity\Builder;
use Illuminate\Support\Facades\Facade;

/**
 * This is the profanity facade class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Profanity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Builder::class;
    }
}
