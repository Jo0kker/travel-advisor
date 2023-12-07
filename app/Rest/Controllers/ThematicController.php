<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\ThematicResource;

class ThematicController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<ThematicResource>
     */
    public static $resource = ThematicResource::class;
}
