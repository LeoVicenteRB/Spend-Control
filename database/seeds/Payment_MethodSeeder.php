<?php

use Illuminate\Database\Seeder;

class Payment_MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
           'description' => 'Crédito Rotativo',
           'max_installments' => '1',
           'min_installments' => '1',
       ]);
         DB::table('payment_methods')->insert([
           'description' => 'Crédito Parcelado Loja',
           'max_installments' => '12',
           'min_installments' => '2',
       ]);
          DB::table('payment_methods')->insert([
           'description' => 'Crédito Parcelado Banco',
           'max_installments' => '12',
           'min_installments' => '2',
       ]);
           DB::table('payment_methods')->insert([
           'description' => 'Debito',
           'max_installments' => '1',
           'min_installments' => '1',
       ]);
            DB::table('payment_methods')->insert([
           'description' => 'Boleto Bancário',
           'max_installments' => '1',
           'min_installments' => '1',
       ]);
    }
}