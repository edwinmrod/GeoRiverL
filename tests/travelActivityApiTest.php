<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class travelActivityApiTest extends TestCase
{
    use MaketravelActivityTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetravelActivity()
    {
        $travelActivity = $this->faketravelActivityData();
        $this->json('POST', '/api/v1/travelActivities', $travelActivity);

        $this->assertApiResponse($travelActivity);
    }

    /**
     * @test
     */
    public function testReadtravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $this->json('GET', '/api/v1/travelActivities/'.$travelActivity->id);

        $this->assertApiResponse($travelActivity->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $editedtravelActivity = $this->faketravelActivityData();

        $this->json('PUT', '/api/v1/travelActivities/'.$travelActivity->id, $editedtravelActivity);

        $this->assertApiResponse($editedtravelActivity);
    }

    /**
     * @test
     */
    public function testDeletetravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $this->json('DELETE', '/api/v1/travelActivities/'.$travelActivity->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/travelActivities/'.$travelActivity->id);

        $this->assertResponseStatus(404);
    }
}
