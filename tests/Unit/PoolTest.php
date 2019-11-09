<?php

class PoolTest extends TestCase
{
    public function testCanListPools() {
        $response = $this->call('GET', '/pools');
        $responseData = json_decode($response->content(), true);

        $this->assertEquals(200, $response->status());
        $this->assertTrue(is_array($responseData));
    }

    public function testCanViewPoolData() {
        $response = $this->call('GET', '/pools/1');
        $responseData = json_decode($response->content(), true);

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('description', $responseData);
        $this->assertArrayHasKey('options', $responseData);
    }

    public function testCanViewPoolStats() {
        $response = $this->call('GET', '/pools/1/stats');
        $responseData = json_decode($response->content(), true);

        $this->assertEquals(200, $response->status());
        $this->assertArrayHasKey('views', $responseData);
        $this->assertArrayHasKey('votes', $responseData);
    }

    public function testCanCreatePool()
    {
        $data = [
            'description' => 'Test description of the pool',
            'options' => [
                'Test description of option 1',
                'Test description of option 2',
                'Test description of option 3',
            ],
        ];

        $response = $this->call('POST', '/pools', $data);
        $responseData = json_decode($response->content(), true);

        $this->assertEquals(201, $response->status());
        $this->assertArrayHasKey('id', $responseData);
    }

    public function testCanVotePool()
    {
        $data = [
            'id' => 1
        ];

        $response = $this->call('POST', '/pools/1/vote', $data);
        $responseData = json_decode($response->content(), true);

        $this->assertEquals(201, $response->status());
        $this->assertArrayHasKey('id', $responseData);
    }
}
