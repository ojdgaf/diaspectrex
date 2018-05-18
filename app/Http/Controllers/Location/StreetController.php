<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Location\Street\CreateOrUpdate;

use App\Models\Location\Street;

use App\Http\Resources\Location\Street as StreetResource;
use App\Http\Resources\Location\Streets as StreetsResource;
use App\Http\Resources\Location\Addresses as AddressesResource;

/**
 * Class StreetController
 * @package App\Http\Controllers\Location
 */
class StreetController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return StreetsResource::collection(Street::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return StreetResource
     */
    public function store(CreateOrUpdate $request)
    {
        $street = Street::create($request->validated());

        return StreetResource::make($street);
    }

    /**
     * @param Street $street
     * @return StreetResource
     */
    public function show(Street $street)
    {
        return StreetResource::make($street);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Street $street
     * @return StreetResource
     */
    public function update(CreateOrUpdate $request, Street $street)
    {
        $street->update($request->validated());

        return StreetResource::make($street);
    }

    /**
     * @param Street $street
     * @throws \Exception
     */
    public function destroy(Street $street)
    {
        $street->delete();

        sendResponse([]);
    }

    /**
     * @param Street $street
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAddresses(Street $street)
    {
        return AddressesResource::collection(
            $street->addresses()->paginate()
        );
    }
}
