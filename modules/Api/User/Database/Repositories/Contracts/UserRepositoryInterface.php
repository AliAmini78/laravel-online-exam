<?php

namespace Api\User\Database\Repositories\Contracts;

use Api\Base\Database\Repositories\Contracts\BaseRepositoryInterface;
use Api\User\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllWithPagination(Request $request): mixed;

    /**
     * @param array $inputs
     * @return mixed
     */
    public function create(array $inputs): mixed;

    /**
     * @param User $user
     * @param array $inputs
     * @return mixed
     */
    public function update(User $user, array $inputs): mixed;

    /**
     * @param User $user
     * @return mixed
     */
    public function delete(User $user): mixed;
}
