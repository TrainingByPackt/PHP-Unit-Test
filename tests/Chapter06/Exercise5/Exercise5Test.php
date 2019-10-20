<?php

namespace Chapter06\Exercise5;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise5Test extends TestCase
{
    private const HEROES = [
        "a-bomb" => ["id" => 1017100, "name" => "A-Bomb (HAS)",],
        "captain-america" => ["id" => 1009220, "name" => "Captain America",],
        "black-panther" => ["id" => 1009187, "name" => "Black Panther",],
    ];

    public function test_can_get_form()
    {
        $crawler = new Crawler($this->get_form());

        $actual= $crawler->filter('form')->attr('action');
        $expected = './super-post-form.php';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $crawler->filter('label')->text();
        $expected = 'Select your hero: ';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $options = $crawler->filter('select > option');
        $actual = $options->eq(0)->text();
        $expected = self::HEROES['a-bomb']['name'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $options->eq(1)->text();
        $expected = self::HEROES['captain-america']['name'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $options->eq(2)->text();
        $expected = self::HEROES['black-panther']['name'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_can_post_form()
    {
        $this->check_post_form('a-bomb');
        $this->check_post_form('captain-america');
        $this->check_post_form('black-panther');
    }

    private function check_post_form(string $hero)
    {
        $crawler = new Crawler($this->post_form($hero));

        $actual = $crawler->filter('div > p')->text();
        $expected = 'Selected hero:';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $crawler->filter('div > h3')->last()->text();
        $expected = self::HEROES[$hero]['name'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $crawler->filter('div > h4')->last()->text();
        $expected = self::HEROES[$hero]['id'];
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise5/super-post-form.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form(string $hero): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise5/super-post-form.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "hero=" . $hero);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }
}
