<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetravelRequest;
use App\Http\Requests\UpdatetravelRequest;
use App\Repositories\travelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class travelController extends AppBaseController
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
    {
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }
        

         $roleUser=Auth::user()->role;
             if($roleUser === 3) {

           return view('travelsD.edit')->with('travel', $travel);
        
        }
		
		else if($roleUser === 2) {
            $pass = $travel;
            return view('travelsE.edit')->with('travel',$travel);
        }
		
        return view('travels.edit')->with('travel', $travel);
    }

	
	    public function enroll($id)
    {
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }
        

         $roleUser=Auth::user()->role;
             if($roleUser === 3) {

           return view('travelsD.enroll')->with('travel', $travel);
        
        }
		
		else if($roleUser === 2) {

            return view('travelsE.enroll')->with('travel', $travel);
        }
		
        return view('travels.enroll')->with('travel', $travel);
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
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            Flash::error('Travel not found');

            return redirect(route('travels.index'));
        }


         $roleUser=Auth::user()->role;
             if($roleUser === 3) {

        $travel = $this->travelRepository->update($request->all(), $id);

        Flash::success('Travel updated successfully.');
       return redirect(route('travelsD.index'));
        
        }
		else if($roleUser === 2) {
		$pass=$request->all();
		   $travel = $this->travelRepository->findWithoutFail($id);

		$travelAuth=$travel->password;
		  
		  if($travelAuth==$pass){
		   return redirect(route('travels.index'));
		  Flash::success('Se ha inscrito a la salida');
		  }
		  else {
		   Flash::error('clave incorrecta');
		  }
		  
                  }
        return redirect(route('travels.index'));
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
