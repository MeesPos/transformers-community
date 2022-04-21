<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChatRoom::query()
            ->create([
                'name' => 'General'
            ]);

        ChatRoom::query()
            ->create([
                'name' => 'General 2'
            ]);
    }
}
