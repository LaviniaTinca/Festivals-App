<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Festival;
use App\Models\FestivalCategory;
use App\Models\UserRole;
use App\Models\SoldTicket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //EventCategory::truncate();
        // Event::truncate();
        DB::table('user_roles')->insert([
            'type' => 'normal user',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_roles')->insert([
            'type' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::factory(10)->create();
        Festival::factory(10)->create();
        Ticket::factory(10)->create();
        SoldTicket::factory(10)->create();

        Event::factory(3)->create();
        Comment::factory(3)->create();
    }
}