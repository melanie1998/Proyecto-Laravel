<?php

namespace App\Policies;

use App\Incidencia;
use App\Profesor;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any incidencias.
     *
     * @param  \App\Profesor  $user
     * @return mixed
     */
    public function viewAny(Profesor $user)
    {
        //
    }

    /**
     * Determine whether the user can view the incidencia.
     *
     * @param  \App\Profesor  $user
     * @param  \App\Incidencia  $incidencia
     * @return mixed
     */
    public function view(Profesor $user, Incidencia $incidencia)
    {
        return $user->id===$incidencia->profesorId;
    }

    /**
     * Determine whether the user can create incidencias.
     *
     * @param  \App\Profesor  $user
     * @return mixed
     */
    public function create(Profesor $user)
    {
        //
    }

    /**
     * Determine whether the user can update the incidencia.
     *
     * @param  \App\Profesor  $user
     * @param  \App\Incidencia  $incidencia
     * @return mixed
     */
    public function update(Profesor $user, Incidencia $incidencia)
    {
        //
    }

    /**
     * Determine whether the user can delete the incidencia.
     *
     * @param  \App\Profesor  $user
     * @param  \App\Incidencia  $incidencia
     * @return mixed
     */
    public function delete(Profesor $user, Incidencia $incidencia)
    {
        //
    }

    /**
     * Determine whether the user can restore the incidencia.
     *
     * @param  \App\Profesor  $user
     * @param  \App\Incidencia  $incidencia
     * @return mixed
     */
    public function restore(Profesor $user, Incidencia $incidencia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the incidencia.
     *
     * @param  \App\Profesor  $user
     * @param  \App\Incidencia  $incidencia
     * @return mixed
     */
    public function forceDelete(Profesor $user, Incidencia $incidencia)
    {
        //
    }
}
