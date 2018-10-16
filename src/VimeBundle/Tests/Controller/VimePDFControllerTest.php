<?php

namespace VimeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VimePDFControllerTest extends WebTestCase
{
    public function testGeneratepdf()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/GeneratePDF');
    }

}
