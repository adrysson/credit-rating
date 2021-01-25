<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CitizenAssetRequest;
use App\Models\Asset;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CitizenAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Citizen $citizen)
    {
        Redis::set("person:$citizen->cpf:last-query", $request->user()->token()->client->name);
        return $citizen->assets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function store(CitizenAssetRequest $request, Citizen $citizen)
    {
        $asset = new Asset($request->only('name', 'value'));
        return $citizen->assets()->save($asset);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Citizen $citizen, Asset $asset)
    {
        Redis::set("person:$citizen->cpf:last-query", $request->user()->token()->client->name);
        return $asset;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen, Asset $asset)
    {
        return $asset->update($request->only('name', 'value'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen, Asset $asset)
    {
        return $asset->delete($asset->_id);
    }
}
