<?php
namespace Trimoz\Permutation\Tests;
include 'bootstrap.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class PermutationControllerTest extends TestCase
{
    public static $tests = [

        'test_1' => [
            'request' => [
                'states[0]' => '.',
                'states[1]' => '.',
                'states[2]' => '.'
            ],
            'response' => [
                ["x", "o", "x"],
                ["x", "o", "o"],
                ["x", "x", "x"],
                ["x", "x", "o"],
                ["o", "o", "x"],
                ["o", "o", "o"],
                ["o", "x", "x"],
                ["o", "x", "o"]
            ]
        ],
        'test_2' => [
            'request' => [
                'states[0]' => '.',
                'states[1]' => 'o',
                'states[2]' => 'x'
            ],
            'response' => [
                ["x", "o", "x"],
                ["o", "o", "x"],
            ]
        ]
    ];

    public function testGET()
    {
        $client = new Client();
        $host = getEnv('SERVER_PHP');

        $params = [
            'query' => self::$tests['test_1']['request']
        ];

        $response = $client->request('GET', $host.'/index.php', $params);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(json_encode(self::$tests['test_1']['response']), $response->getBody());


        $params = [
            'query' => self::$tests['test_2']['request']
        ];

        $response = $client->request('GET', $host.'/index.php', $params);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(json_encode(self::$tests['test_2']['response']), $response->getBody());
    }
}