<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
        	'content'	=> 'Waiting for Justice League Trailer like...',
            'likes'     => 0,
        	'user_id' 	=>	1,
        	]);
        DB::table('status')->insert([
        	'content'	=> 'Donald Trump gana las elecciones presidenciales de USA...',
            'likes'     => 0,
        	'user_id' 	=>	2,
        	]);
    }
}
