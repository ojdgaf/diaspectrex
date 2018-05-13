<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Location\Address\CreateOrUpdate;

use App\Models\Location\Address;

use App\Http\Resources\Location\Address as AddressResource;
use App\Http\Resources\Location\Addresses as AddressesResource;

/**
 * Class AddressController
 * @package App\Http\Controllers\Api\Location
 */
class AddressController extends Controller
{
    /**
     * @return AddressesResource
     */
    public function index()
    {
        return new AddressesResource(Address::paginate(static::LOCATION_PAGINATION));
    }

    /**
     * @param CreateOrUpdate $request
     * @return AddressResource
     */
    public function store(CreateOrUpdate $request)
    {
        $address = Address::create($request->all());

        return new AddressResource($address);
    }

    /**
     * @param Address $address
     * @return AddressResource
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Address $address
     * @return AddressResource
     */
    public function update(CreateOrUpdate $request, Address $address)
    {
        $address->update($request->all());

        return new AddressResource($address);
    }

    /**
     * @param Address $address
     * @throws \Exception
     */
    public function destroy(Address $address)
    {
        $address->delete();

        sendResponse([]);
    }
}
