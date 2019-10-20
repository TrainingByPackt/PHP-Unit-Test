<?php

namespace Chapter06\Exercise9;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise9Test extends TestCase
{
    private const EMAIL = 'johndoe@doe.com';
    private const COOKIE = 'cookie.txt';

    public function test_get_request_obtains_form()
    {
        $crawler = new Crawler($this->get_form());

        $label = $crawler->filter('form > label');
        $actual = $label->last()->text();
        $expected = 'New email:';
        $this->assertStringContainsString($expected, $actual);

        $buttons = $crawler->filter('form > button');
        $actual = $buttons->eq(0)->text();
        $expected = 'Submit without CSRF Token';
        $this->assertStringContainsString($expected, $actual);

        $actual = $buttons->eq(1)->text();
        $expected = 'Submit with empty/invalid CSRF Token';
        $this->assertStringContainsString($expected, $actual);

        $actual = $buttons->eq(2)->text();
        $expected = 'Submit with CSRF Token';
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_post_form_without_csrf_token()
    {
        $crawler = new Crawler($this->post_form(self::EMAIL));
        $actual =  $crawler->filter('p')->text();
        $expected = 'ERROR: The CSRF Token was not found in POST payload.';
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_post_form_with_invalid_csrf_token()
    {
        $crawler = new Crawler($this->post_form(self::EMAIL, 'invalid-csrf-token'));
        $actual =  $crawler->filter('p')->text();
        $expected = 'ERROR: The CSRF Token is not valid.';
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_post_form_with_valid_token()
    {
        $crawler = new Crawler($this->post_form_with_valid_csrf(self::EMAIL));
        $actual =  $crawler->filter('p')->text();
        $expected = 'OK: The CSRF Token is valid. Will continue with email validation...';
        $this->assertStringContainsString($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise9/form-csrf.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/' . self::COOKIE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/' . self::COOKIE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form(string $email, ?string $csrfToken = null): string
    {
        $csrfToken = $csrfToken ? '&csrf-token=' . $csrfToken : '';

        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise9/form-csrf.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'email=' . $email . $csrfToken);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form_with_valid_csrf(string $email): string
    {
        $crawler = new Crawler($this->get_form());
        $buttons = $crawler->filter('form > button');
        $csrfToken = $buttons->last()->attr('value');

        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise9/form-csrf.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'email' => $email,
            'csrf-token' => $csrfToken,
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/' . self::COOKIE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/' . self::COOKIE);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
