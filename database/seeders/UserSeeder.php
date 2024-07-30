<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Jobs\QueueUserData;

class UserSeeder extends Seeder
{
    public function run()
    {
        dispatch(new QueueUserData());
    }
}
