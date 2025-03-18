<?php

namespace Api\User\Database\Repositories\Repos;

use Api\Base\Database\Repositories\Repo\BaseRepository;
use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Api\User\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
