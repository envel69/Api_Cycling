<?php
// tests/Controller/CyclingControllerTest.php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CyclingControllerTest extends WebTestCase
{
    public function testListCyclingWithToken(): void
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/login_check',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode(['username' => 'test', 'password' => 'test'])
        );
        $loginResponse = $client->getResponse();
        $data = json_decode($loginResponse->getContent(), true);
        $this->assertArrayHasKey('token', $data);
        $token = $data['token'];

        $client->request(
            'GET',
            '/api/cycling/',
            [],
            [],
            ['HTTP_AUTHORIZATION' => 'Bearer ' . $token, 'CONTENT_TYPE' => 'application/json']
        );
        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }
}
