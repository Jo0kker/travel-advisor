<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\SeasonResource;

class SeasonController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<SeasonResource>
     */
    public static $resource = SeasonResource::class;
}
