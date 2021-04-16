<?php

use Illuminate\Database\Seeder;
// use Auth;

class LifewakeSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('lifewakes')->insert([
            ['user_id' => '111','happiness' => '50','date_num' => '0','headline' => 'A','episode' => 'AAA'],
            ['user_id' => '111','happiness' => '100','date_num' => '1','headline' => 'B','episode' => 'BBB'],
            ['user_id' => '111','happiness' => '75','date_num' => '2','headline' => 'C','episode' => 'CCC'],
            // ['user_id' => Auth::user()->user_id,'happiness' => '75','date_num' => '2','headline' => 'C','episode' => 'CCC'],
        ]);
    }
}
