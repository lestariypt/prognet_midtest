<?php

namespace App\Policies;

use App\Models\Jabatan;
use App\Models\Mahasiswa;
use Illuminate\Auth\Access\HandlesAuthorization;

class JabatanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Mahasiswa $mahasiswa, Jabatan $jabatan)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Mahasiswa $mahasiswa, Jabatan $jabatan)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Mahasiswa $mahasiswa, Jabatan $jabatan)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Mahasiswa $mahasiswa, Jabatan $jabatan)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Mahasiswa $mahasiswa, Jabatan $jabatan)
    {
        //
    }
}
