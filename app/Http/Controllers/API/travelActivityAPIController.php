<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetravelActivityAPIRequest;
use App\Http\Requests\API\UpdatetravelActivityAPIRequest;
use App\Models\travelActivity;
use App\Repositories\travelActivityRepository;
use Illuminate\Http\Request;
use GeoRiver\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class travelActivityController
 * @package App\Http\Controllers\API
 */

class travelActivityAPIController extends AppBaseController
{
    /** @var  travelActivityRepository */
    private $travelActivityRepository;

    public function __construct(travelActivityRepository $travelActivityRepo)
    {
        $this->travelActivityRepository = $travelActivityRepo;
    }

    /**
     * Display a listing of the travelActivity.
     * GET|HEAD /travelActivities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->travelActivityRepository->pushCriteria(new RequestCriteria($request));
        $this->travelActivityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $travelActivities = $this->travelActivityRepository->all();

        return $this->sendResponse($travelActivities->toArray(), 'Travel Activities retrieved successfully');
    }

    /**
     * Store a newly created travelActivity in storage.
     * POST /travelActivities
     *
     * @param CreatetravelActivityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetravelActivityAPIRequest $request)
    {
        $input = $request->all();

        $travelActivities = $this->travelActivityRepository->create($input);

        return $this->sendResponse($travelActivities->toArray(), 'Travel Activity saved successfully');
    }

    /**
     * Display the specified travelActivity.
     * GET|HEAD /travelActivities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var travelActivity $travelActivity */
        $travelActivity = $this->travelActivityRepository->findWithoutFail($id);

        if (empty($travelActivity)) {
            return $this->sendError('Travel Activity not found');
        }

        return $this->sendResponse($travelActivity->toArray(), 'Travel Activity retrieved successfully');
    }

    /**
     * Update the specified travelActivity in storage.
     * PUT/PATCH /travelActivities/{id}
     *
     * @param  int $id
     * @param UpdatetravelActivityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetravelActivityAPIRequest $request)
    {
        $input = $request->all();

        /** @var travelActivity $travelActivity */
        $travelActivity = $this->travelActivityRepository->findWithoutFail($id);

        if (empty($travelActivity)) {
            return $this->sendError('Travel Activity not found');
        }

        $travelActivity = $this->travelActivityRepository->update($input, $id);

        return $this->sendResponse($travelActivity->toArray(), 'travelActivity updated successfully');
    }

    /**
     * Remove the specified travelActivity from storage.
     * DELETE /travelActivities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var travelActivity $travelActivity */
        $travelActivity = $this->travelActivityRepository->findWithoutFail($id);

        if (empty($travelActivity)) {
            return $this->sendError('Travel Activity not found');
        }

        $travelActivity->delete();

        return $this->sendResponse($id, 'Travel Activity deleted successfully');
    }
}
