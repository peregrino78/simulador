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
				'name' => 'Portabilidade',
			],
        ];

        foreach ($types as $key => $type) {
			OperationType::create($type);
        }
    }
}
