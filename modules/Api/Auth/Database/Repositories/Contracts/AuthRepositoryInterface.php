<?php

namespace Api\Auth\Database\Repositories\Contracts;

use Api\Base\Database\Repositories\Contracts\BaseRepositoryInterface;

interface AuthRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param array $inputs
     * @return mixed
     */
    public function login(array $inputs): mixed;
}
