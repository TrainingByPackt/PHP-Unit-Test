<?php

namespace Chapter08\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
	public function test_no_argument_throws_error() {
		$expected = 'At least one number is required.';
		$actual   = exec( "php -f app/Chapter08/Activity/factorial.php" );
		$this->assertStringContainsString( $expected, $actual );
	}

	public function test_can_calculate_factorial()
	{
		$expected = '3! = 6';
		$actual   = exec( "php -f app/Chapter08/Activity/factorial.php 3" );
		$this->assertStringContainsString( $expected, $actual );
	}

	public function test_not_a_number_throws_exception()
	{
		$expected = 'a is not a number.';
		$actual   = exec( "php -f app/Chapter08/Activity/factorial.php a" );
		$this->assertStringContainsString( $expected, $actual );
	}

	public function test_not_an_integer_throws_exception() {
		$expected = '3.14 is decimal; integer is expected.';
		$actual   = exec( "php -f app/Chapter08/Activity/factorial.php 3.14" );
		$this->assertStringContainsString( $expected, $actual );
	}

	public function test_negative_integer_throws_exception() {
		$expected = 'Given -3 while higher than zero is expected.';
		$actual   = exec( "php -f app/Chapter08/Activity/factorial.php -- -3" );
		$this->assertStringContainsString( $expected, $actual );
	}
}
