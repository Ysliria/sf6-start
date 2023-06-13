<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloWorldControllerTest extends WebTestCase
{
    public function testItWorks(): void
    {
        $client = static::createClient();
        $client->request('GET', '/hello');

        self::assertResponseIsSuccessful();
    }
}
