<?php

namespace Chapter08\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_can_handle_error_with_custom_handler()
    {
        $expected = 'NAN';
        $actual = $this->actual();
        $this->assertStringContainsString($expected, $actual);
        $this->assertFileExists('app/Chapter08/Exercise2/app.log');
        $f = fopen('app/Chapter08/Exercise2/app.log', 'r');
        if (!feof($f)) {
            $actual = fgets($f);
            $expected = 'Undefined variable: width';
            $this->assertStringContainsString($expected, $actual);
        }
        fclose($f);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter08/Exercise2/log-handler.php';
        return ob_get_clean();
    }
}
