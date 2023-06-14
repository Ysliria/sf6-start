<?php

namespace Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloWorldControllerTest extends WebTestCase
{
    public static function provideValidURLs(): \Generator
    {
        yield 'default' => [
            'uri' => '/hello'
        ];

        yield 'with name Mickaël' => [
            'uri' => '/hello/Mickaël'
        ];

        yield 'with name Jean-Lou' => [
            'uri' => '/hello/Jean-Lou'
        ];
    }

    /**
     * @group type/smoke
     *
     * @dataProvider provideValidURLs
     */
    public function testItWorks(string $uri): void
    {
        $client = static::createClient();
        $client->request('GET', $uri);

        self::assertResponseIsSuccessful();
    }
}
