<?php

use Illuminate\Database\Seeder;

class statesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        DB::table('states')->insert(['id' => 1, 'initials' => 'AC', 'name' => 'Acre']);
        DB::table('states')->insert(['id' => 2, 'initials' => 'AL', 'name' => 'Alagoas']);
        DB::table('states')->insert(['id' => 3, 'initials' => 'AP', 'name' => 'Amapá']);
        DB::table('states')->insert(['id' => 4, 'initials' => 'AM', 'name' => 'Amazonas']);
        DB::table('states')->insert(['id' => 5, 'initials' => 'BA', 'name' => 'Bahia']);
        DB::table('states')->insert(['id' => 6, 'initials' => 'CE', 'name' => 'Ceará']);
        DB::table('states')->insert(['id' => 7, 'initials' => 'DF', 'name' => 'Distrito Federal']);
        DB::table('states')->insert(['id' => 8, 'initials' => 'ES', 'name' => 'Espírito Santo']);
        DB::table('states')->insert(['id' => 9, 'initials' => 'GO', 'name' => 'Goiás']);
        DB::table('states')->insert(['id' => 10, 'initials' => 'MA', 'name' => 'Maranhão']);
        DB::table('states')->insert(['id' => 11, 'initials' => 'MT', 'name' => 'Mato Grosso']);
        DB::table('states')->insert(['id' => 12, 'initials' => 'MS', 'name' => 'Mato Grosso do Sul']);
        DB::table('states')->insert(['id' => 13, 'initials' => 'MG', 'name' => 'Minas Gerais']);
        DB::table('states')->insert(['id' => 14, 'initials' => 'PA', 'name' => 'Pará']);
        DB::table('states')->insert(['id' => 15, 'initials' => 'PB', 'name' => 'Paraíba']);
        DB::table('states')->insert(['id' => 16, 'initials' => 'PR', 'name' => 'Paraná']);
        DB::table('states')->insert(['id' => 17, 'initials' => 'PE', 'name' => 'Pernambuco']);
        DB::table('states')->insert(['id' => 18, 'initials' => 'PI', 'name' => 'Piauí']);
        DB::table('states')->insert(['id' => 19, 'initials' => 'RJ', 'name' => 'Rio de Janeiro']);
        DB::table('states')->insert(['id' => 20, 'initials' => 'RN', 'name' => 'Rio Grande do Norte']);
        DB::table('states')->insert(['id' => 21, 'initials' => 'RS', 'name' => 'Rio Grande do Sul']);
        DB::table('states')->insert(['id' => 22, 'initials' => 'RO', 'name' => 'Rondônia']);
        DB::table('states')->insert(['id' => 23, 'initials' => 'RR', 'name' => 'Roraima']);
        DB::table('states')->insert(['id' => 24, 'initials' => 'SC', 'name' => 'Santa Catarina']);
        DB::table('states')->insert(['id' => 25, 'initials' => 'SP', 'name' => 'São Paulo']);
        DB::table('states')->insert(['id' => 26, 'initials' => 'SE', 'name' => 'Sergipe']);
        DB::table('states')->insert(['id' => 27, 'initials' => 'TO', 'name' => 'Tocantins']);
    }
}
