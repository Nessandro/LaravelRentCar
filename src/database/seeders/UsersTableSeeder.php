<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new User();
        $model->first_name  = 'Tomasz';
        $model->last_name   = 'Developer';
        $model->email       = 'example@example.com';
        $model->password    = bcrypt('test');
        $model->is_active   = true;
        $model->save();

        User::factory()->count(2)->create();
    }
}
