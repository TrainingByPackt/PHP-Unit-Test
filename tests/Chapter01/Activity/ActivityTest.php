<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    private const MOVIE_NAME = 'Batman';
    private const MOVIE_STAR = 'Ledger';
    private const MOVIE_YEAR = '2010';

    public function test_equal_output_asserts_equal()
    {
        $expectedTitle = '<title>' . self::MOVIE_NAME . '</title>';
        $expectedH1 = '<h1>Information about ' . self::MOVIE_NAME . '</h1>';
        $expectedPFirstPart = self::MOVIE_STAR . ' starred in the movie ' . self::MOVIE_NAME;
        $expectedH1PSecondPart = 'which was released in year ' . self::MOVIE_YEAR;
        $actual = $this->actual();
        $this->assertStringContainsString($expectedTitle, $actual);
        $this->assertStringContainsString($expectedH1, $actual);
        $this->assertStringContainsString($expectedPFirstPart, $actual);
        $this->assertStringContainsString($expectedH1PSecondPart, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = '<h2>Lena Dunham</h2>';
        $actual = $this->actual();
        $this->assertStringNotContainsStringIgnoringCase($expected, $actual);
    }

    private function actual(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter01/Activity/movies.php"
            . "?movieName=" . self::MOVIE_NAME
            . "&movieStar=" . self::MOVIE_STAR
            . "&movieYear=" . self::MOVIE_YEAR;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
