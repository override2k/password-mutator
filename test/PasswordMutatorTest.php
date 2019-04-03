<?php

namespace Overdesign\Test;

use Overdesign\PasswordMutator\PasswordMutator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Overdesign\PasswordMutator\PasswordMutator
 */
class PasswordMutatorTest extends TestCase
{
    /**
     * @covers \Overdesign\PasswordMutator\PasswordMutator::toggleLCaseFirst
     * @dataProvider passwordProvider
     */
    public function testToggleLCaseFirst($password, $firstLetterCaseToggle)
    {
        $mutated = PasswordMutator::toggleLCaseFirst($password);

        $this->assertEquals($firstLetterCaseToggle, $mutated);
    }

    /**
     * @covers \Overdesign\PasswordMutator\PasswordMutator::toggleCaseAll
     * @dataProvider passwordProvider
     */
    public function testToggleCaseAll($password, $firstLetterCaseToggle, $fullCaseToggle)
    {
        $mutated = PasswordMutator::toggleCaseAll($password);

        $this->assertEquals($fullCaseToggle, $mutated);
    }

    public function passwordProvider()
    {
        // Password, FirstLetterCaseToggle, FullCaseToggle
        yield ['', '', ''];
        yield ['Am24!4%éKx', 'am24!4%éKx', 'aM24!4%ÉkX'];
        yield ['123abcefs$', '123abcefs$', '123ABCEFS$'];
        yield ['éúËBfm&', 'éúËBfm&', 'ÉÚëbFM&'];
    }
}
