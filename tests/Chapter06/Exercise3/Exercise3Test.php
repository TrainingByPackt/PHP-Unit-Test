<?php

namespace Chapter06\Exercise3;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise3Test extends TestCase
{
    private const NAMES = ["A-Bomb (HAS)", "Captain America", "Black Panther",];

    public function test_can_set_session_and_get_random_name()
    {
        $crawler = new Crawler($this->actual());

        $paragraphs = $crawler->filter('p');
        $expected = 'The cookie with session name [PHPSESSID] does not exist.';
        $actual = $paragraphs->eq(0)->text();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $expected = 'A new cookie will be set for session name [PHPSESSID], with value';
        $actual = $paragraphs->eq(1)->text();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $paragraphs->eq(2)->text();
        $this->assertRegExp('/^The name \[(A-Bomb \(HAS\)|Captain America|Black Panther)\] was picked and stored in current session.$/', $actual);
    }

    private function actual(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise3/session.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

}
