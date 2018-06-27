<?php


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list');

        $link = $crawler->selectLink('Add contact')->link();
        $request = $client->click($link);
        $client->followRedirect();
        $this->assertEquals(200, $request->getStatusCode());
    }
}