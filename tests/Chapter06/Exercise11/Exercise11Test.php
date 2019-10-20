<?php

namespace Chapter06\Exercise11;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise11Test extends TestCase
{
    public function test_get_request_obtains_form()
    {
        $crawler = new Crawler($this->get_form());

        $actual = $crawler->filter('h1')->text();
        $expected = 'Hello, world!';
        $this->assertStringContainsString($expected, $actual);

        $actual = $crawler->filter('main > div')->text();
        $expected = 'No content was provided for main layout.';
        $this->assertStringContainsString($expected, $actual);

        $links = $crawler->filter('a');
        $actual = $links->eq(0)->text();
        $expected = 'Learning PHP';
        $this->assertStringContainsString($expected, $actual);

        $actual = $links->eq(1)->text();
        $expected = 'Home';
        $this->assertStringContainsString($expected, $actual);

        $actual = $links->eq(2)->text();
        $expected = 'Profile';
        $this->assertStringContainsString($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise11/bootstrap/web/index.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
