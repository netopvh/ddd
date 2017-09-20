<?php

namespace App\Domains\Access\Repositories;

use App\Domains\Access\Validators\UserValidator;
use App\Exceptions\Access\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Models\User;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;

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
     * @override
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     *
     *
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
            $model->roles()->attach($attributes['role_id']);
        }
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    /**
     * @Override
     *
     * @throws GeneralException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->applyScope();

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        if($model->save()){
            $model->roles()->detach();
            $model->roles()->attach($attributes['role_id']);
        }

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filterUsers($field, $value, $columns = ['*'])
    {
        return $this->model->newQuery()->where($field,'like','%'. $value .'%')->paginate(8);
    }

    public function findUser($id)
    {
        $result = $this->model->newQuery()->where('id', $id)->get()->first();
        if (is_null($result)){
            throw new GeneralException("Não foi localizado nenhum registro no banco de dados");
        }

        return $result;
    }
}
