<?php

namespace App\Rest\Resources;

use App\Models\Address;
use App\Rest\Resource as RestResource;
use Lomkit\Rest\Http\Requests\RestRequest;
use Lomkit\Rest\Relations\BelongsTo;
use Lomkit\Rest\Relations\HasMany;
use Lomkit\Rest\Relations\MorphMany;

class AddressResource extends RestResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<Address>
     */
    public static $model = Address::class;

    /**
     * The exposed fields that could be provided
     * @param RestRequest $request
     * @return array
     */
    public function fields(RestRequest $request): array
    {
        return [
            'id',
            'address_line_1',
            'address_line_2',
            'latitude',
            'longitude',
            'zip_code',
            'city_id',
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
        return [
            BelongsTo::make('city', CityResource::class),
            HasMany::make('activity', ActivityResource::class),
            MorphMany::make('media', MediaResource::class)
        ];
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
