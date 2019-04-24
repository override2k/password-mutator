<?php

namespace Overdesign\PasswordMutator;

class Toggle
{
    public const NONE       = 0;
    public const CASE_FIRST = 1;
    public const CASE_ALL   = 2;
    public const DEFAULT    = self::CASE_FIRST | self::CASE_ALL;
}
