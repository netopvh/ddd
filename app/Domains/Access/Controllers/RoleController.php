<?php
namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\Access\Repositories\Contracts\RoleRepository;

class RoleController extends Controller
{

    public $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('access.roles.index')
            ->with('roles', $this->roleRepository->all());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }

}