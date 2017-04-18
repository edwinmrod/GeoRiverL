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
  //$this->userRepository->pushCriteria(new RequestCriteria($request));
    //    $users = $this->userRepository->all();

          return view('perfil.index')
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

        Flash::success('User saved successfully.');

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

        return redirect(route('perfil.index'));
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

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
