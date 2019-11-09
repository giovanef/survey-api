<?php

class BasicTest extends TestCase
{
    public function testIsReady()
    {
        $this->call('GET', '/');

        $this
            ->seeJsonEquals([
                'message' => 'Survey API',
                'status' => 'Connected'
            ]);
    }
}
