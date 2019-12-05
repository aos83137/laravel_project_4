<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // App\User::find(2)->questions()->create([
        //     'title' => 'First title question',
        //     'content' => 'First content'
        // ]);

        $users = App\User::all();

        $users->each(function ($user){
            $user->questions()->save(
                factory(App\Question::class)->make()
            ,10);
        });
    }
}
