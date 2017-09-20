<?php

namespace App\Domains\Access\Repositories;

use App\Domains\Access\Validators\UserValidator;
use App\Exceptions\Access\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Models\User;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Illuminate\Container\Container as Application;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Domains\Access\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function validator()
    {
        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Save a new entity in repository
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        //Verifica se existe usuário no banco de dados
        $result = $this->model->newQuery()
            ->where('name', $attributes['name'])
            ->where('username', $attributes['username'])
            ->get();

        if (empty($result)){
            throw new GeneralException('Usuário já consta em nosso banco de dados');
        }
        $model = $this->model->newInstance($attributes);
        if($model->save()){
            $model->newQuery()->attachRole($attributes['role_id']);
        }
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }
}
