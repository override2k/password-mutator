<?php

namespace Overdesign\Test;

use Overdesign\PasswordMutator\PasswordMuttator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Overdesign\PasswordMutator\PasswordMuttator
 */
class PasswordMuttatorTest extends TestCase
{
    /**
     * @covers \Overdesign\PasswordMutator\PasswordMuttator::toggleCaseFirst
     * @dataProvider passwordProvider
     */
    public function testToggleCaseFirst($password, $firstLetterCaseToggle)
    {
        $mutated = PasswordMuttator::toggleCaseFirst($password);

        $this->assertEquals($firstLetterCaseToggle, $mutated);
    }

    /**
     * @covers \Overdesign\PasswordMutator\PasswordMuttator::toggleCaseAll
     * @dataProvider passwordProvider
     */
    public function testToggleCaseAll($password, $firstLetterCaseToggle, $fullCaseToggle)
    {
        $mutated = PasswordMuttator::toggleCaseAll($password);

        $this->assertEquals($fullCaseToggle, $mutated);
    }

    public function passwordProvider()
    {
        // Password, FirstLetterCaseToggle, FullCaseToggle
        yield ['Am24!4%éKx', 'am24!4%éKx', 'aM24!4%ÉkX'];
        yield ['123abcefs$', '123abcefs$', '123ABCEFS$'];
        yield ['éúËBfm&', 'ÉúËBfm&', 'ÉÚëbFM&'];
    }
}
