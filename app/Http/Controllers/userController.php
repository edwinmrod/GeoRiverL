<?php

namespace GeoRiver\Http\Controllers;

use GeoRiver\Http\Requests\CreateuserRequest;
use GeoRiver\Http\Requests\UpdateuserRequest;
use GeoRiver\Repositories\userRepository;
use GeoRiver\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class userController extends AppBaseController
{
    /** @var  userRepository */
    private $userRepository;

    public function __construct(userRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the user.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();
	
		foreach ($users as $r) {
       
            if( $r['role'] === "1"){

            $r['role']="Administrador";
            
            }
            else if($r['role'] === "2"){
            $r['role']="Estudiante";
            }
            
            else{
            $r['role']="Profesor";
            }
        } 
        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param CreateuserRequest $request
     *
     * @return Response
     */
    public function store(CreateuserRequest $request)
    {
        $requestData = $request->all();
        $password=bcrypt($request->input('password'));
        $requestData['password'] = $password;
        
        $user = $this->userRepository->create($requestData);

        Flash::success('Usuario creado satisfactoriamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified user.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        if($user->role == "1"){
            $user->role="Administrador";
            
            }
            else if($user->role == "2"){
            $user['role']="Estudiante";
            }
            
            else{
            $user['role']="Profesor";
            }
        return view('users.show')->with('user', $user);

    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int              $id
     * @param UpdateuserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateuserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $requestData = $request->all();
        
        $password=bcrypt($request->input('password'));
        $requestData['password'] = $password;

        $user = $this->userRepository->update($requestData, $id);

        Flash::success('Usuario actualizado satisfactoriamente.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuario eliminado satisfactoriamente.');

        return redirect(route('users.index'));
    }
}
