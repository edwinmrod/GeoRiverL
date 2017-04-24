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
use Auth;
class perfilController extends AppBaseController
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

        $users=Auth::user();
        if($users->role == 2){
            return view('perfil2.index')
            ->with('users', $users);
        }

          return view('perfil.index')
            ->with('users', $users);

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

            return redirect(route('perfil.index'));
        }
        if($user->role==2){
            return view('perfil2.show')->with('user', $user);
        }
        return view('perfil.show')->with('user', $user);
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

            return redirect(route('perfil.index'));
        }
        if($user->role==2){
            return view('perfil2.edit')->with('user',$user);
        }

        return view('perfil.edit')->with('user', $user);
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

            return redirect(route('perfil.index'));
        }


        $requestData = $request->all();
        
        $password=bcrypt($request->input('password'));
        $requestData['password'] = $password;

        $user = $this->userRepository->update($requestData, $id);

        Flash::success('Perfil Modificado');
        
        if($user->role == 2){
            return redirect(route('perfil2.index'));
        }
            return redirect(route('perfil.index'));
    }

}
