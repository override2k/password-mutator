<?php

namespace Overdesign\PasswordMutator;

class PasswordMutator
{
    private const LOWERCASE = 'àèìòùáéíóúýâêîôûãñõäëïöüÿçabcdefghijklmnñopqrstuvwxyz';
    private const UPPERCASE = 'ÀÈÌÒÙÁÉÍÓÚÝÂÊÎÔÛÃÑÕÄËÏÖÜŸÇABCDEFGHIJKLMNÑOPQRSTUVWXYZ';

    /**
     * Returns given password with first letter in lowercase, this resemble mobile phone input behaviour
     *
     * @param string $password
     *
     * @return string
     */
    public static function toggleLCaseFirst(string $password): string
    {
        if ($password === '') {
            return $password;
        }

        $firstLetter = mb_substr($password, 0, 1);

        if (strpos(self::UPPERCASE, $firstLetter) !== false) {
            return mb_strtolower($firstLetter) . mb_substr($password, 1);
        }

        return $password;
    }

    /**
     * Returns given password with case toggle applied to all letters, like if the password
     *
     * @param string $password
     *
     * @return string
     */
    public static function toggleCaseAll(string $password): string
    {
        return implode('', array_map(static function ($letter) {
            return self::toggleLetter($letter);
        }, preg_split('//u', $password, -1, PREG_SPLIT_NO_EMPTY)));
    }

    /**
     * @param $letter
     *
     * @return string
     */
    private static function toggleLetter($letter): string
    {
        if (strpos(self::LOWERCASE, $letter) !== false) {
            return mb_strtoupper($letter);
        }

        if (strpos(self::UPPERCASE, $letter) !== false) {
            return mb_strtolower($letter);
        }

        return $letter;
    }
}
