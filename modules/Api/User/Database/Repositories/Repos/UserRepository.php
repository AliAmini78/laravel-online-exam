<?php

namespace Api\User\Database\Repositories\Repos;

use Api\Base\Database\Repositories\Repos\BaseRepository;
use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Api\User\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function getAllWithPagination(\Illuminate\Http\Request $request): mixed
    {
        $perPage = $request->get('per_page') ?? 20;
        $relation = $request->get('relation') ?? [];

        return $this->model
            ->newQuery()
            ->filter($request)
            ->with($relation)
            ->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function create(array $inputs): mixed
    {
        return $this->model
            ->newQuery()
            ->create($inputs);
    }

    /**
     * @inheritDoc
     */
    public function update(User $user, array $inputs): mixed
    {
        return $user->update($inputs);
    }

    /**
     * @inheritDoc
     */
    public function delete(User $user): mixed
    {
        return $user->delete();
    }
}
