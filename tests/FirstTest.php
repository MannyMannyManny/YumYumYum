<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FirstTest extends TestCase {

    public function testGeneral()
    {
        $homepage = $this->call('GET', '/');
        $this->assertEquals(200, $homepage->status());
    }
    
    public function testStatsError()
    {
        //Check ERROR on empty POST
        $stat = $this->action('POST', 'StatController@saveStats');
        $parse = json_decode($stat->getContent(),true);
        if($parse['status'] == 'ERROR') {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testAdminRedirect()
    {
        $response = $this->call('GET', '/admin/users/');
        //CHECK IF REDIRECT IS HERE FOR ADMIN
        $this->assertEquals(302, $response->status());
    }

}