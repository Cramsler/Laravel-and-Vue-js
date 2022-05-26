<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countOfUsers = User::count();

        for($i = 1; $i <= $countOfUsers; $i++)
        {
            DB::table('chat_user')->insert([
                'user_id' => $i,
                'chat_id' => rand(1, 10)
            ]);
        }
    }
}
