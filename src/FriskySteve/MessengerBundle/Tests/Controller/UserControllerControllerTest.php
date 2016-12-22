<?php

namespace FriskySteve\MessengerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerControllerTest extends WebTestCase
{
    public function testShowallusers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllUsers');
    }

}
