<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\AddressResource;

class AddressController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<AddressResource>
     */
    public static $resource = AddressResource::class;
}
