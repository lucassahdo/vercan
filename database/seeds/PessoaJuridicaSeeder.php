<?php

use Illuminate\Database\Seeder;
use App\Models\PessoaJuridica;
use Faker\Factory as Faker;

class PessoaJuridicaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('pessoas_juridicas')->truncate();

        $faker = Faker::create();

        foreach(range(1, 200) as $i) {            
            echo "[Pessoa Juridica] Seeding: $i\n";
            PessoaJuridica::create([
                'cnpj'              => $faker->numerify('##.###.##/###-##'),
                'razao_social'      => $faker->company,
                'nome_fantasia'     => $faker->word,
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
