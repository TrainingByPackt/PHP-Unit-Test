<?php

namespace Chapter06\Exercise4;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise4Test extends TestCase
{
    private const HEROES = [
        "a-bomb" => ["id" => 1017100, "name" => "A-Bomb (HAS)",],
        "captain-america" => ["id" => 1009220, "name" => "Captain America",],
        "black-panther" => ["id" => 1009187, "name" => "Black Panther",],
    ];

    public function test_can_set_session_and_get_querystring_related_values()
    {
        $this->check_values('a-bomb');
        $this->check_values('captain-america');
        $this->check_values('black-panther');
    }

    private function actual(string $hero): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise4/super-get-href.php?hero=" . $hero;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function check_values(string $queryStringValue)
    {
        $crawler = new Crawler($this->actual($queryStringValue));

        $actual= $crawler->filter('h3')->text();
        $expected = self::HEROES[$queryStringValue]['name'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual= $crawler->filter('h4')->text();
        $expected = self::HEROES[$queryStringValue]['id'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }
}
