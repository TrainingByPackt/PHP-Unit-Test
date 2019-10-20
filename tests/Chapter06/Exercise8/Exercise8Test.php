<?php

namespace Chapter06\Exercise8;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise8Test extends TestCase
{
    public function test_get_request_obtains_form()
    {
        $crawler = new Crawler($this->get_form());

        $actual= $crawler->filter('form')->attr('action');
        $expected = 'output-escape-reflected.php';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $label = $crawler->filter('form > label');
        $actual = $label->last()->text();
        $expected = 'Search term:';
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_search_return_values()
    {
        $search = 'Oranges';
        $crawler = new Crawler($this->run_search($search));

        $actual = $crawler->filter('p')->last()->text();
        $expected = "You have searched for: " . $search;
        $this->assertStringContainsString($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise8/output-escape-reflected.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function run_search(string $search): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise8/output-escape-reflected.php?s=" . $search;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
