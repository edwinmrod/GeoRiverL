<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetravelRequest;
use App\Http\Requests\UpdatetravelRequest;
use App\Repositories\travelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use App\Http\Models\travelUser;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use Carbon\Carbon;

class registerTravelController extends AppBaseController
{
    /** @var  travelRepository */
    private $travelRepository;

    public function __construct(travelRepository $travelRepo)
    {
        $this->travelRepository = $travelRepo;
    }

    /**
     * Display a listing of the travel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->travelRepository->pushCriteria(new RequestCriteria($request));
        $travels = $this->travelRepository->all();


        
        $roleUser=Auth::user()->role;
             if($roleUser === 3) {

            return view('travelsD.index')
            ->with('travels', $travels);
        }
		
		   else if($roleUser === 2) {

            return view('travelsE.index')
            ->with('travels', $travels);
        }
		
        return view('travels.index')
            ->with('travels', $travels);
    }

    /**
     * Show the form for creating a new travel.
     *
     * @return Response
     */
    public function create()
    {

 $roleUser=Auth::user()->role;
             if($roleUser === 3) {

            return view('travelsD.create');
        
        }

        return view('travels.create');
    }

    /**
     * Store a newly created travel in storage.
     *
     * @param CreatetravelRequest $request
     *
     * @return Response
     */
    public function store(CreatetravelRequest $request)
    {
        $input = $request->all();

        $travel = $this->travelRepository->create($input);

        Flash::success('Travel saved successfully.');


      $roleUser=Auth::user()->role;
             if($roleUser === 3) {

          return redirect(route('travelsD.index'));
        
        }
        
        return redirect(route('travels.index'));
    }

    /**
     * Display the specified travel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }
        


      $roleUser=Auth::user()->role;
             if($roleUser === 3) {

          return view('travelsD.show')->with('travel', $travel);
        
        }

        return view('travels.show')->with('travel', $travel);
    }

    /**
     * Show the form for editing the specified travel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }   
		
       
       
		Flash::success('Travel saved successfully.');
       // return view('travels.edit')->with('travel', $travel);
	   return view('travelsE.edit')->with('travel', $travel);
    }

	
	    public function enroll($id)
    {
       
    }
    /**
     * Update the specified travel in storage.
     *
     * @param  int              $id
     * @param UpdatetravelRequest $request
     *
     * @return Response
     */
       public function update($id, UpdatetravelRequest $request)
    {
	
      $idUser=Auth::user()->id;
	  $travel = $this->travelRepository->findWithoutFail($id);
      $pass = $travel->password;
      $passSended = $request->password;	  
	
	if($pass==$passSended){
	DB::table('travel_users')->insertGetId(
    array('idTravel' => $id, 'idUser' => $idUser, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'))
);
	 
		Flash::success('Se ha inscrito');
	}
	
	else {
	 Flash::error('clave incorrecta');
	return (redirect(route('travelsE.index')));
	}

	//return ("vea la BD");
	
	return redirect(route('travelsE.index'));
       // return redirect(route('travels.index'));
    }

    /**
     * Remove the specified travel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }

        $this->travelRepository->delete($id);

        Flash::success('Travel deleted successfully.');

          $roleUser=Auth::user()->role;
             if($roleUser === 3) {

        return redirect(route('travelsD.index'));
        
        }

        return redirect(route('travels.index'));
    }
}
