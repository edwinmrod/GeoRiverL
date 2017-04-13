<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetravelUserAPIRequest;
use App\Http\Requests\API\UpdatetravelUserAPIRequest;
use App\Models\travelUser;
use App\Repositories\travelUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class travelUserController
 * @package App\Http\Controllers\API
 */

class travelUserAPIController extends AppBaseController
{
    /** @var  travelUserRepository */
    private $travelUserRepository;

    public function __construct(travelUserRepository $travelUserRepo)
    {
        $this->travelUserRepository = $travelUserRepo;
    }

    /**
     * Display a listing of the travelUser.
     * GET|HEAD /travelUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->travelUserRepository->pushCriteria(new RequestCriteria($request));
        $this->travelUserRepository->pushCriteria(new LimitOffsetCriteria($request));
        $travelUsers = $this->travelUserRepository->all();

        return $this->sendResponse($travelUsers->toArray(), 'travel Users retrieved successfully');
    }

    /**
     * Store a newly created travelUser in storage.
     * POST /travelUsers
     *
     * @param CreatetravelUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetravelUserAPIRequest $request)
    {
        $input = $request->all();

        $travelUsers = $this->travelUserRepository->create($input);

        return $this->sendResponse($travelUsers->toArray(), 'travel User saved successfully');
    }

    /**
     * Display the specified travelUser.
     * GET|HEAD /travelUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var travelUser $travelUser */
        $travelUser = $this->travelUserRepository->findWithoutFail($id);

        if (empty($travelUser)) {
            return $this->sendError('travel User not found');
        }

        return $this->sendResponse($travelUser->toArray(), 'travel User retrieved successfully');
    }

    /**
     * Update the specified travelUser in storage.
     * PUT/PATCH /travelUsers/{id}
     *
     * @param  int $id
     * @param UpdatetravelUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetravelUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var travelUser $travelUser */
        $travelUser = $this->travelUserRepository->findWithoutFail($id);

        if (empty($travelUser)) {
            return $this->sendError('travel User not found');
        }

        $travelUser = $this->travelUserRepository->update($input, $id);

        return $this->sendResponse($travelUser->toArray(), 'travelUser updated successfully');
    }

    /**
     * Remove the specified travelUser from storage.
     * DELETE /travelUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var travelUser $travelUser */
        $travelUser = $this->travelUserRepository->findWithoutFail($id);

        if (empty($travelUser)) {
            return $this->sendError('travel User not found');
        }

        $travelUser->delete();

        return $this->sendResponse($id, 'travel User deleted successfully');
    }
}
