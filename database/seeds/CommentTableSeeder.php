<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
        	'content'		=> 'Ha! Zack was joking.',
        	'likes'			=> 0,
            'status_id'     => 1,
        	'user_id'		=> 2
        	]);

        DB::table('comments')->insert([
        	'content'		=> 'Adios Barack Obama!',
        	'likes'			=> 0,
            'status_id'     => 2,
        	'user_id'		=> 1
        	]);

    }
}
