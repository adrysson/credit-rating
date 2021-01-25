<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDebtRequest;
use App\Models\Debt;
use App\Models\User;
use Illuminate\Http\Request;

class UserDebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $user->debts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(UserDebtRequest $request, User $user)
    {
        $request->request->add(['oauth_client_id' => $request->user()->token()->client_id]);
        $debt = new Debt($request->all());
        return $user->debts()->save($debt);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Debt $debt)
    {
        $this->authorize($user);
        return $debt;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Debt $debt)
    {
        $this->authorize($user);
        return $debt->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Debt $debt)
    {
        $this->authorize($user);
        return $debt->delete();
    }
}
