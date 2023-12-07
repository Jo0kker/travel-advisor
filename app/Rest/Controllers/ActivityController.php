<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\ActivityResource;

class ActivityController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<ActivityResource>
     */
    public static $resource = ActivityResource::class;
}
