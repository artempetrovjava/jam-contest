<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InvitationControllerTest extends WebTestCase
{
    public function testGetSendInvitations()
    {
        $client = static::createClient();

        $response = $client->post('/api/v1/invitation/send?userId=1');

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('id', $finishedData[0]);
        $this->assertArrayHasKey('status', $finishedData[0]);
        $this->assertArrayHasKey('firstName', $finishedData[0]);
        $this->assertArrayHasKey('lastName', $finishedData[0]);
    }

    public function testGetReceivedInvitations()
    {
        $client = static::createClient();

        $response = $client->post('/api/v1/received/send?userId=1');

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('id', $finishedData[0]);
        $this->assertArrayHasKey('status', $finishedData[0]);
        $this->assertArrayHasKey('firstName', $finishedData[0]);
        $this->assertArrayHasKey('lastName', $finishedData[0]);
    }


    public function testCancelRequest()
    {
        $client = static::createClient();

        $response = $client->put('/api/v1/invitation/5?action=cancel');

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('success', $finishedData[0]);
    }

    public function testDeclineRequest()
    {
        $client = static::createClient();

        $response = $client->put('/api/v1/invitation/5?action=decline');

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('success', $finishedData[0]);
    }

    public function testAcceptRequest()
    {
        $client = static::createClient();

        $response = $client->put('/api/v1/invitation/5?action=accept');

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('success', $finishedData[0]);
    }

    public function testSendRequest()
    {
        $client = static::createClient();

        $response = $client->post('/api/v1/invitation/5?action=accept', [
            'senderId' => 1,
            'receiverId' => 2,
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $finishedData = json_decode($response->getBody(true), true);
        $this->assertArrayHasKey('success', $finishedData[0]);
    }
}
