<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonDebtRequest;
use App\Models\Debt;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonDebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function index(Person $person)
    {
        return $person->debts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function store(PersonDebtRequest $request, Person $person)
    {
        $request->request->add(['oauth_client_id' => $request->user()->token()->client_id]);
        $debt = new Debt($request->all());
        return $person->debts()->save($debt);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person, Debt $debt)
    {
        $this->authorize($person);
        return $debt;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person, Debt $debt)
    {
        $this->authorize($person);
        return $debt->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person, Debt $debt)
    {
        $this->authorize($person);
        return $debt->delete();
    }
}
