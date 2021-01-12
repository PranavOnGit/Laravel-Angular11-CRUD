<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no_of_rows = 1000;
        for( $i=1; $i <= $no_of_rows; $i++){
            DB::table('alied_users')->insert([
                'userName' => 'Alied_'.$i,
                'role' => 'Developer',
                'city' =>'Pune_'.$i,
                'department' =>'IT_'.$i,
            ]);
        }
    }
}
