<?php

/*
 * This file is part of consoletvs/profanity.
 *
 * (c) Erik Campobadal <soc@erik.cat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleTVs\Profanity\Classes;

/**
 * This is the profanity class.
 *
 * @author Erik Campobadal <soc@erik.cat>
 */
class Blocker
{
    public $dictionary;
    public $blocker;
    public $text;

    /**
     * Setup the Profanity filter.
     *
     * @param string $text
     * @return void
     */
    public function __construct($text, $blocker)
    {
        $this->text = $text;
        $this->blocker = $blocker;
        $this->dictionary = json_decode(file_get_contents(__DIR__ . '/../Dictionaries/Default.json'), true);
    }

    /**
     * Set the text to filter.
     *
     * @param string $text
     * @return self
     */
    public function text($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Set the blocker string (string that will replace bad words).
     *
     * @param string $blocker
     * @return self
     */
    public function blocker($blocker)
    {
        $this->blocker = $blocker;

        return $this;
    }

    /**
     * Set the blocker dictionary (string = path to json, array = dictionary) (bad words).
     *
     * @param mixed $dictionary
     * @return self
     */
    public function dictionary($dictionary)
    {
        $this->dictionary = is_array($dictionary) ? $dictionary : json_decode(file_get_contents($dictionary), true);

        return $this;
    }

    /**
     * Return true if the text is clean.
     *
     * @return bool
     */
    public function clean()
    {
        return count($this->badWords()) == 0;
    }

    /**
     * Return the bad words contained in the text.
     *
     * @return array
     */
    public function badWords()
    {
        return collect($this->dictionary)->filter(function ($value) {
            return str_contains(strtolower($this->text), strtolower($value['word']));
        })->map(function ($value) {
            return [
                'language' => $value['language'],
                'word' => strtolower($value['word'])
            ];
        })->toArray();
    }

    /**
     * Filter the string blocking the bad words with the blocker string.
     *
     * @return string
     */
    public function filter()
    {
        $bad_words = collect($this->badWords())->pluck('word')->toArray();

        return collect(explode(' ', $this->text))->map(function ($value) use ($bad_words) {
            return (str_contains(strtolower($value), $bad_words)) ? $this->blocker : $value;
        })->implode(' ');
    }
}
