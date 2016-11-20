<?php

use Illuminate\Database\Seeder;
use App\Post;

class DatabaseSeeder extends Seeder
{

    protected $connection = 'mongodb';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Cool Dude',
            'email' => 'cooldude@example.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Steven Marsh',
            'email' => 'steven.tj.marsh@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $user_id  = DB::table('users')
                            ->select('id')
                            ->where('name', 'Steven Marsh')
                            ->first()
                            ->id;

        $user_id2  = DB::table('users')
            ->select('id')
            ->where('name', 'Cool Dude')
            ->first()
            ->id;

        Post::create(
            [
            'content' => 'Dummy Post',
            'user_id' => $user_id,
            ]
        );

        Post::create(
            [
                'content' => 'Dummy Post B',
                'user_id' => $user_id2,
            ]
        );

        Post::create(
            [
                'content' => 'Dummy Post C',
                'user_id' => $user_id,
            ]
        );

        Post::create(
            [
                'content' => 'Dummy Post D',
                'user_id' => $user_id2,
            ]
        );
    }
}
