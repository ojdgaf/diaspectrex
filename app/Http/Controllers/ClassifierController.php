<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classifier\CreateOrUpdate;
use App\Models\Classifier;
use App\Http\Resources\Classifier as ClassifierResource;
use App\Http\Resources\Classifiers as ClassifiersResource;

class ClassifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ClassifiersResource
     */
    public function index()
    {
        return new ClassifiersResource(Classifier::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return ClassifierResource
     */
    public function store(CreateOrUpdate $request)
    {
        $classifier = Classifier::create($request->validated());

        return new ClassifierResource($classifier);
    }

    /**
     * Display the specified resource.
     *
     * @param Classifier $classifier
     * @return ClassifierResource
     */
    public function show(Classifier $classifier)
    {
        return new ClassifierResource($classifier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Classifier $classifier
     * @return ClassifierResource
     */
    public function update(CreateOrUpdate $request, Classifier $classifier)
    {
        $classifier->update($request->validated());

        return new ClassifierResource($classifier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classifier $classifier
     */
    public function destroy(Classifier $classifier)
    {
        $classifier->delete();

        sendResponse([]);
    }
}
