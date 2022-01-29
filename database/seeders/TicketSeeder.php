<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        if ($user) {
            Ticket::factory()
                ->state([
                    'user_id' => $user->getKey() 
                ])
                ->count(3)
                ->forDepartment()
                ->has(
                    TicketMessage::factory()
                        ->state([
                            'user_id' => $user->getKey()
                        ])
                        ->count(20)
                    , 'messages'
                )
                ->create();
        }
    }
}
