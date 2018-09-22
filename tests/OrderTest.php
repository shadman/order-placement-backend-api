<?php

class OrderTest extends TestCase
{
    /**
     * Placing Order Request Test.
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
                'status'
        ]);

        $this->assertEquals('UNASSIGN', $json->status); 
        $this->assertEquals(4000, $json->distance); 
    }


    /**
     * First time submit Take Order Request Test.
     *
     * @return void
     */
    public function testTakeOrder()
    {
        $orderData = [
            "origin" => ["12121222", "31231231"],
            "destination" => ["454545", "4465456"]
        ];

        $responseOrder = $this->json('POST', '/order', $orderData)->response->getContent();
        $jsonResponse = json_decode($responseOrder);        
        $this->assertResponseStatus(200);


        // Updating Status
        $data = [
            "status" => "taken",
        ];

        $response = $this->json('PUT', '/order/'.$jsonResponse->id, $data)->response->getContent();
        $json = json_decode($response);

        $this->assertResponseStatus(200);
        $this->seeJsonStructure([
                'status'
        ]);

        $this->assertEquals('SUCCESS', $json->status);


        // Resubmitting Update Status to verify required behaviour
        $responseResubmit = $this->json('PUT', '/order/'.$jsonResponse->id, $data)->response->getContent(); 

        $this->assertResponseStatus(409);
        $this->seeJsonStructure([
                'error'
        ]);
    }


    /**
     * Listing Orders Request Test.
     *
     * @return void
     */
    public function testListOrders()
    {
        $response = $this->json('GET', '/order?page=1&limit=5', [])->response->getContent();
        $json = json_decode($response);
        
        $this->assertResponseStatus(200);
        $this->seeJsonStructure([
                ['id', 'distance', 'status' ]
        ]);
    }


    /**
     * Listing Orders Request With No Pagination Params Test.
     *
     * @return void
     */
    public function testListOrdersNoParams()
    {
        $response = $this->json('GET', '/order', [])->response->getContent();
        $json = json_decode($response);
        
        $this->assertResponseStatus(500);
    }

}
