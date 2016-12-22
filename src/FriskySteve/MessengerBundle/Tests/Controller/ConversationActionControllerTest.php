<?php

namespace FriskySteve\MessengerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConversationActionControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');
    }

    public function testAdduser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addUser');
    }

    public function testClose()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/close');
    }

}
