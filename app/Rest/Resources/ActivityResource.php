<?php

namespace App\Rest\Resources;

use App\Models\Activity;
use App\Rest\Resource as RestResource;
use Lomkit\Rest\Http\Requests\RestRequest;

class ActivityResource extends RestResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<Activity>
     */
    public static $model = Activity::class;

    /**
     * The exposed fields that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function fields(RestRequest $request): array
    {
        return [
            'id',
            'name',
            'description',
            'address_id',
            'created_at',
            'updated_at',
            'deleted_at'
        ];
    }

    /**
     * The exposed relations that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function relations(RestRequest $request): array
    {
        return [];
    }

    /**
     * The exposed scopes that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function scopes(RestRequest $request): array
    {
        return [];
    }

    /**
     * The exposed limits that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function limits(RestRequest $request): array
    {
        return [
            10,
            25,
            50
        ];
    }

    /**
     * The actions that should be linked
     * @param RestRequest $request
     * @return array
     */
    public function actions(RestRequest $request): array {
        return [];
    }

    /**
     * The instructions that should be linked
     * @param RestRequest $request
     * @return array
     */
    public function instructions(RestRequest $request): array {
        return [];
    }
}
