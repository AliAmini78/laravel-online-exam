<?php

namespace Api\Base\Http\Controllers;

use Api\Base\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Api\Base\Database\Repositories\Contracts\BaseRepositoryInterface;

class ApiController extends Controller
{
    use ApiResponseTrait;
}
