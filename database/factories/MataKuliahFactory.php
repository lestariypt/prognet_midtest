<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode'=>$this->faker->unique()->ean8(),
            'nama_mata_kuliah'=>$this->faker->word(),
            'semester'=>mt_rand(1,8),
            'sks'=>mt_rand(2,3),
            'prodi'=> implode("", Arr::random(['Teknologi Informasi','Teknik Mesin'],1)),
            'status_mk'=> implode("", Arr::random(['Wajib','Pilihan'],1))
        ];
    }
}
