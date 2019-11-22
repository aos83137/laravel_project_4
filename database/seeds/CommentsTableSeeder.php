<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // App\Question::find(1)->comments()->create([
        //     'comment' => 'First comments test!',
        // ]);
        
        $users = App\Question::all();

        $users->each(function ($user){
            $user->comments()->save(
                factory(App\Comment::class)->make()
            );
        });
    }
}
