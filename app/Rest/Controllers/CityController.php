<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\CityResource;

class CityController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<CityResource>
     */
    public static $resource = CityResource::class;
}
