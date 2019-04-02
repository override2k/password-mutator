<?php

namespace Overdesign\PasswordMutator;

class PasswordMuttator
{
    private const LOWERCASE = 'àèìòùáéíóúýâêîôûãñõäëïöüÿçabcdefghijklmnñopqrstuvwxyz';
    private const UPPERCASE = 'ÀÈÌÒÙÁÉÍÓÚÝÂÊÎÔÛÃÑÕÄËÏÖÜŸÇABCDEFGHIJKLMNÑOPQRSTUVWXYZ';

    /**
     * @param string $password
     *
     * @return string
     */
    public static function toggleCaseFirst(string $password): string
    {
        // TODO Check length
        $firstLetter = mb_substr($password, 0, 1);

        return self::toggleLetter($firstLetter) . mb_substr($password, 1);
    }

    /**
     * @param string $password
     *
     * @return string
     */
    public static function toggleCaseAll(string $password): string
    {
        return implode('', array_map(static function ($letter) {
            return self::toggleLetter($letter);
        }, str_split($password)));
    }

    /**
     * @param $letter
     *
     * @return string
     */
    private static function toggleLetter($letter): string
    {
        if (strpos(self::LOWERCASE, $letter) !== false) {
            return strtr($letter, self::LOWERCASE, self::UPPERCASE);
        }

        if (strpos(self::UPPERCASE, $letter) !== false) {
            return strtr($letter, self::UPPERCASE, self::LOWERCASE);
        }

        return $letter;
    }
}
