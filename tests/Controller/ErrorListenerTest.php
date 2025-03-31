<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ErrorListenerTest extends WebTestCase
{
    public function testErrorListenerReturnsJson(): void
    {
        $client = static::createClient(['debug' => false]);
        $client->request('GET', '/api/test-error');
        $response = $client->getResponse();

        $this->assertStringContainsString('application/json', $response->headers->get('Content-Type'));

        $data = json_decode($response->getContent(), true);
        $this->assertIsArray($data);
        $this->assertArrayHasKey('error', $data);
        $this->assertSame("Test d'erreur", $data['error']);
    }
}
