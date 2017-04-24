<?php

use Faker\Factory as Faker;
use App\Models\travelActivity;
use App\Repositories\travelActivityRepository;

trait MaketravelActivityTrait
{
    /**
     * Create fake instance of travelActivity and save it in database
     *
     * @param array $travelActivityFields
     * @return travelActivity
     */
    public function maketravelActivity($travelActivityFields = [])
    {
        /** @var travelActivityRepository $travelActivityRepo */
        $travelActivityRepo = App::make(travelActivityRepository::class);
        $theme = $this->faketravelActivityData($travelActivityFields);
        return $travelActivityRepo->create($theme);
    }

    /**
     * Get fake instance of travelActivity
     *
     * @param array $travelActivityFields
     * @return travelActivity
     */
    public function faketravelActivity($travelActivityFields = [])
    {
        return new travelActivity($this->faketravelActivityData($travelActivityFields));
    }

    /**
     * Get fake data of travelActivity
     *
     * @param array $postFields
     * @return array
     */
    public function faketravelActivityData($travelActivityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_activity' => $fake->randomDigitNotNull,
            'id_travel' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $travelActivityFields);
    }
}
