<?php

namespace FriskySteve\MessengerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConversationControllerTest extends WebTestCase
{
    public function testNewconversation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newConversation');
    }

    public function testShowallcoversations()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllCoversations');
    }

    public function testShowconversation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showConversation/{id}');
    }

}
