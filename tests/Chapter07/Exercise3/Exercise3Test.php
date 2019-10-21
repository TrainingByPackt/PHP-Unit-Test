<?php

namespace Chapter07\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    private const FILE = '/sample/users_list.csv';

    public function test_can_get_memory_cost_from_get_file_contents()
    {
        $expected = '--';
        $actual = exec("php -f app/Chapter07/Exercise3/file_get_contents-memory.php" . ' ' . self::FILE);;
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_can_get_memory_cost_from_fread()
    {
        $expected = '--';
        $actual = exec("php -f app/Chapter07/Exercise3/fread-memory.php" . ' ' . self::FILE);;
        $this->assertStringContainsString($expected, $actual);
    }
}
