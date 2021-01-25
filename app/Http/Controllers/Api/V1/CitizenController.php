<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CitizenRequest;
use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CitizenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitizenRequest $request)
    {
        return Citizen::create($request->only('cpf', 'address', 'age', 'source_of_incoming'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function show(Citizen $citizen)
    {
        return $citizen;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citizen $citizen)
    {
        return $citizen->update($request->only('cpf', 'address', 'age', 'source_of_incoming'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citizen $citizen)
    {
        return $citizen->destroy($citizen->_id);
    }
}
