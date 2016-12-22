<?php

namespace FriskySteve\MessengerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testShowallusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllUsers');
    }

}
