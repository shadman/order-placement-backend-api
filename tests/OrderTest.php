<?php

class OrderTest extends TestCase
{
    /**
     * Place order test.
     *
     * @return void
     */
    public function testPlaceOrder()
    {
        $data = [
            "origin" => ["12121222", "31231231"],
            "destination" => ["454545", "4465456"]
        ];
        
        $response = $this->json('POST', '/order', $data)->response->getContent();
        $json = json_decode($response);
        
        $this->assertResponseStatus(200);
        $this->seeJsonStructure([
                'id',
                'distance',
                'status',
        ]);

        $this->assertEquals('UNASSIGN', $json->status); 
        $this->assertEquals(4000, $json->distance); 

        return $response;
    }

}
