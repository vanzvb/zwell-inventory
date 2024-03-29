<?php

namespace Database\Seeders;

use App\Master\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Supplier::create([
            'supplier_name' => 'Robinsons Mall Glorietta',
            'supplier_code' => 'Robinsons Mall Glorietta',
            'contact_person' => 'Mr Robinson',
            'contact_no' => '09112233445',
            'email' => 'robinson@gmail.com',
            'address' => 'General Trias Cavite',
            'notes' => 'supplier for the month of may'
        ]);

        Supplier::create([
            'supplier_name' => 'Walter Mart',
            'supplier_code' => 'Walter Mart',
            'contact_person' => 'Mr Walter',
            'contact_no' => '09212233446',
            'email' => 'WalterMart@gmail.com',
            'address' => 'Trece Marteres Cavite',
            'notes' => 'supplier for the month of june'
        ]);

    }
}
