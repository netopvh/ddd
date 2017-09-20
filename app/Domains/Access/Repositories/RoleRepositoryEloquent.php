<?php

namespace App\Domains\Access\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Models\Role;
use App\Domains\Access\Validators\RoleValidator;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Domains\Access\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    public function validator()
    {
        return RoleValidator::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
