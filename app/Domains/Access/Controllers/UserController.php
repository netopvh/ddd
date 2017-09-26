<?php

namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Exceptions\Access\GeneralException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userRepository;
    public $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        if (($search = $request->get('search'))) {
            $data = $this->userRepository->filterUsers('name', $search);
        } else {
            $data = $this->userRepository->paginate(10);
        }

        return view('access.users.index')
            ->with('users', $data);
    }

    public function create()
    {

        return view('access.users.add')
            ->with('roles', $this->roleRepository->all());
    }

    public function store(Request $request)
    {
        try{
            if ($this->userRepository->create($request->all())){
                return redirect()->route('admin.users')->with('success','Registro inserido com sucesso!');
            }
            return null;
        }catch (GeneralException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
    }

    public function edit($id)
    {
        try{
            return view('access.users.edit')
                ->with('user',$this->userRepository->findUser($id))
                ->with('roles', $this->roleRepository->all());
        }catch (GeneralException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try{
            if ($this->userRepository->update($request->all(), $id)){
                return redirect()->route('admin.users')->with('success','Registro alterado com sucesso!');
            }
        }catch (ModelNotFoundException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $this->userRepository->delete($id);
            return redirect()->route('admin.users')->with('success','Registro removido com sucesso!');
        }catch (GeneralException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
    }
    
}