<?php

namespace Chapter06\Exercise6;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class Exercise6Test extends TestCase
{
    public function test_can_get_form()
    {
        $crawler = new Crawler($this->get_form());

        $actual= $crawler->filter('form')->attr('action');
        $expected = './super-post-upload.php';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $inputs = $crawler->filter('form > input');
        $actual = $inputs->eq(0)->attr('type');
        $expected = 'file';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);

        $actual = $inputs->eq(1)->attr('type');
        $expected = 'submit';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_can_post_form()
    {
        $actual = $this->post_form();
        $expected = 'The file was uploaded successfully.';
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    private function get_form(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise6/super-post-upload.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }

    private function post_form(): string
    {
        list($delimiter, $postData) = $this->prepare_data_to_upload();

        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter06/Exercise6/super-post-upload.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: multipart/form-data; boundary=' . $delimiter,
            'Content-Length: ' . strlen($postData),
            ]
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }

    private function prepare_data_to_upload(): array
    {
        $boundary = uniqid();
        return [
            '-------------' . $boundary,
            $this->build_data_file(
                $boundary,
                ['uploadFile' => file_get_contents('app/Chapter06/Exercise6/my-image.png'),]
            ),
        ];
    }

    private function build_data_file(string $boundary, array $contents): string
    {
        $delimiter = '---------------' . $boundary;
        $data = $delimiter . PHP_EOL .
            'Content-disposition: form-data; name=uploadFile; filename=uploadFile' . PHP_EOL .
            'Content-Transfer-Encoding: binary' . PHP_EOL;

        $data .= PHP_EOL . $contents['uploadFile'] . PHP_EOL . $delimiter . '--' . PHP_EOL;

        return $data;
    }
}
