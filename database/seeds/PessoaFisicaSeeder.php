<?php

use Illuminate\Database\Seeder;
use App\Models\PessoaFisica;
use Faker\Factory as Faker;

class PessoaFisicaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('pessoas_fisicas')->truncate();

        $faker = Faker::create();

        foreach(range(1, 200) as $i) {
            echo "[Pessoa Fisica] Seeding: $i\n";
            PessoaFisica::create([
                'cpf'               => $faker->numerify('###.###.###-##'),
                'nome'              => $faker->name,
                'cep'               => $faker->numerify('#####-###'),
                'rua'               => $faker->streetName,
                'numero'            => $faker->buildingNumber(),
                'bairro'            => $faker->word,
                'estado'            => $faker->state,
                'cidade'            => $faker->city,
                'telefone'          => $faker->numerify('(##) ####-####'),
                'email'             => $faker->companyEmail
            ]);
        }
    }
}
