<?php

namespace EML\CmsBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertTrue(
                $client->getResponse()->isRedirect()
        );
    }
    
    public function testHome(){
        $client = static::createClient();
        
        
    }
}
