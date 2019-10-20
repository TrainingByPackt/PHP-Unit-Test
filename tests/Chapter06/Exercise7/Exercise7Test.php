<?php

namespace Chapter06\Exercise7;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise7Test extends TestCase
{
    private const TEXT_MESSAGE = "Test message";

    public function test_get_request_obtains_form()
    {
        $crawler = new Crawler($this->get_form());

        $labels = $crawler->filter('form > label');
        $actual = $labels->eq(0)->text();
        $expected = 'Stars: ';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $labels->eq(1)->text();
        $expected = 'Message: ';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $textArea = $crawler->filter('form > textarea');
        $actual = $textArea->last()->attr('name');
        $expected = 'message';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_valid_input_values()
    {
        $crawler = new Crawler($this->post_form(3, self::TEXT_MESSAGE));

        $actual = $crawler->filter('p')->eq(0)->text();
        $expected = "Stars: 3";
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $crawler->filter('p')->eq(1)->text();
        $expected = "Message: '" . self::TEXT_MESSAGE . "'";
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_invalid_input_values()
    {
        $crawler = new Crawler($this->post_form(30, self::TEXT_MESSAGE));

        $actual = $crawler->filter('p')->eq(0)->text();
        $expected = 'Stars can have values between 1 and 5.';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise7/input-sanitize.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form(int $stars, string $message): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise7/input-sanitize.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'stars=' . $stars .'&message=' . $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
