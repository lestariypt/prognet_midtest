<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=>"I Gede Tresna Agung Saputra",
            'nim'=>"asiap",
            'alamat'=>"Jalan raya yangbatu",
            'telepon'=>$this->faker->phoneNumber(),
            'password_mahasiswa' => bcrypt("tresna"), 
            'program_studi'=>implode("",Arr::random(['Teknologi Informasi', 'Teknik Mesin'],1)),
            'angkatan'=>'2020',
            'foto_mahasiswa'=>'//',
            'jabatan'=>'admin'
        ];
    }
}
