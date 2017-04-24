<?php

use App\Models\travelActivity;
use App\Repositories\travelActivityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class travelActivityRepositoryTest extends TestCase
{
    use MaketravelActivityTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var travelActivityRepository
     */
    protected $travelActivityRepo;

    public function setUp()
    {
        parent::setUp();
        $this->travelActivityRepo = App::make(travelActivityRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetravelActivity()
    {
        $travelActivity = $this->faketravelActivityData();
        $createdtravelActivity = $this->travelActivityRepo->create($travelActivity);
        $createdtravelActivity = $createdtravelActivity->toArray();
        $this->assertArrayHasKey('id', $createdtravelActivity);
        $this->assertNotNull($createdtravelActivity['id'], 'Created travelActivity must have id specified');
        $this->assertNotNull(travelActivity::find($createdtravelActivity['id']), 'travelActivity with given id must be in DB');
        $this->assertModelData($travelActivity, $createdtravelActivity);
    }

    /**
     * @test read
     */
    public function testReadtravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $dbtravelActivity = $this->travelActivityRepo->find($travelActivity->id);
        $dbtravelActivity = $dbtravelActivity->toArray();
        $this->assertModelData($travelActivity->toArray(), $dbtravelActivity);
    }

    /**
     * @test update
     */
    public function testUpdatetravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $faketravelActivity = $this->faketravelActivityData();
        $updatedtravelActivity = $this->travelActivityRepo->update($faketravelActivity, $travelActivity->id);
        $this->assertModelData($faketravelActivity, $updatedtravelActivity->toArray());
        $dbtravelActivity = $this->travelActivityRepo->find($travelActivity->id);
        $this->assertModelData($faketravelActivity, $dbtravelActivity->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetravelActivity()
    {
        $travelActivity = $this->maketravelActivity();
        $resp = $this->travelActivityRepo->delete($travelActivity->id);
        $this->assertTrue($resp);
        $this->assertNull(travelActivity::find($travelActivity->id), 'travelActivity should not exist in DB');
    }
}
