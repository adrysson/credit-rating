<?php

namespace App\Policies;

use App\Models\Debt;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DebtPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return mixed
     */
    public function view(User $user, Debt $debt)
    {
        return $debt->client->id === $user->token()->client_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return mixed
     */
    public function update(User $user, Debt $debt)
    {
        return $debt->client->id === $user->token()->client_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return mixed
     */
    public function delete(User $user, Debt $debt)
    {
        return $debt->client->id === $user->token()->client_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return mixed
     */
    public function restore(User $user, Debt $debt)
    {
        return $debt->client->id === $user->token()->client_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Debt  $debt
     * @return mixed
     */
    public function forceDelete(User $user, Debt $debt)
    {
        return $debt->client->id === $user->token()->client_id;
    }
}
