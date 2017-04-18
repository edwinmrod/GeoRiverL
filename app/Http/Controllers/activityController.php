<?php

namespace GeoRiver\Http\Controllers;

use GeoRiver\Http\Requests\CreateactivityRequest;
use GeoRiver\Http\Requests\UpdateactivityRequest;
use GeoRiver\Repositories\activityRepository;
use GeoRiver\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class activityController extends AppBaseController
{
    /** @var  activityRepository */
    private $activityRepository;

    public function __construct(activityRepository $activityRepo)
    {
        $this->activityRepository = $activityRepo;
    }

    /**
     * Display a listing of the activity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
	
	

        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $activities = $this->activityRepository->all();

        $roleUser=Auth::user()->role;
             if($roleUser === 3) {

            return view('activitiesD.index')
            ->with('activities', $activities);
        }
		

        return view('activities.index')
            ->with('activities', $activities);
    }

    /**
     * Show the form for creating a new activity.
     *
     * @return Response
     */
    public function create()
    {

             $roleUser=Auth::user()->role;
             if($roleUser === 3) {
    return view('activitiesD.create');
        }
        return view('activities.create');
    }

    /**
     * Store a newly created activity in storage.
     *
     * @param CreateactivityRequest $request
     *
     * @return Response
     */
    public function store(CreateactivityRequest $request)
    {
        $input = $request->all();

        $activity = $this->activityRepository->create($input);

        Flash::success('Actividad Guardada.');

         $roleUser=Auth::user()->role;
             if($roleUser === 3) {
           return redirect(route('activitiesD.index'));
        }

        return redirect(route('activities.index'));
    }

    /**
     * Display the specified activity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

         $roleUser=Auth::user()->role;
             if($roleUser === 3) {
             return view('activitiesD.show')->with('activity', $activity);
        }

        return view('activities.show')->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified activity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }


  $roleUser=Auth::user()->role;
             if($roleUser === 3) {
             return view('activitiesD.edit')->with('activity', $activity);
        }
        return view('activities.edit')->with('activity', $activity);
    }

    /**
     * Update the specified activity in storage.
     *
     * @param  int              $id
     * @param UpdateactivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateactivityRequest $request)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        $activity = $this->activityRepository->update($request->all(), $id);

        Flash::success('Actividad Modificada.');

        $roleUser=Auth::user()->role;
             if($roleUser === 3) {
               return redirect(route('activitiesD.index'));
        }

        return redirect(route('activities.index'));
    }

    /**
     * Remove the specified activity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        $this->activityRepository->delete($id);

        Flash::success('Actividad Eliminada.');

          $roleUser=Auth::user()->role;
             if($roleUser === 3) {
               return redirect(route('activitiesD.index'));
        }

        return redirect(route('activities.index'));
    }
}
