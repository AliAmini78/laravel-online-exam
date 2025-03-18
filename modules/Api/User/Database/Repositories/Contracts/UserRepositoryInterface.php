<?php

namespace Api\User\Database\Repositories\Contracts;

use Api\Base\Database\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllWithPagination(Request $request): mixed;
}
