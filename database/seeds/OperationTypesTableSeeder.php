<?php

use App\Models\OperationType;
use Illuminate\Database\Seeder;

class OperationTypesTableSeeder extends Seeder
{
	/**
    * Run the database seeds.
    *
    * @return void
    */
   	public function run()
   	{
		$types = [
			[
            	'code' => '001',
            	'name' => 'Contrato Novo',
         	],
			[
            	'code' => '002',
            	'name' => 'Portabilidade',
         	],
         	[
            	'code' => '003',
            	'name' => 'Refinanciamento',
			 ],
			 [
            	'code' => '004',
            	'name' => 'Refin da Portabilidade',
         	],
      	];

      	foreach ($types as $key => $type) {
			OperationType::create($type);
      	}
   	}
}
