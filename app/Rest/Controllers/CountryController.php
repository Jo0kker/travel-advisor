<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\CountryResource;

class CountryController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<CountryResource>
     */
    public static $resource = CountryResource::class;
}
