<?php

namespace Chapter06\Exercise2;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise2Test extends TestCase
{
    private const REF_CODE = 'Event19';

    public function test_get_request_obtains_form()
    {
        $crawler = new Crawler($this->get_form());

        $paragraphs = $crawler->filter('p');
        $expected = 'No referral code was set in query string.';
        $actual = $paragraphs->eq(0)->text();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $expected = 'Referral code (sent by browser as cookie): [-None-]';
        $actual = $paragraphs->eq(1)->text();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $expected = 'super-cookie.php';
        $actual = $crawler->filter('form')->attr('action');
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $inputs = $crawler->filter('input');
        $expected = strtoupper(self::REF_CODE);
        $actual = $inputs->eq(0)->attr('placeholder');
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $expected = 'Apply referral code';
        $actual = $inputs->eq(1)->attr('value');
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_post_form_obtains_cookie()
    {
        $crawler = new Crawler($this->post_form(self::REF_CODE));
        $actual = $crawler->filter('p')->eq(0)->text();
        $expected = 'The referral code [' . self::REF_CODE . '] was stored in a cookie. Reload the page to see the cookie value above.';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise2/super-cookie.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form(string $refCode): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise2/super-cookie.php?refcode=" . $refCode;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
