<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // https://laravel.com/docs/8.x/seeding

    // run : php artisan db:seed --class=UserSeeder
    public function run()
    {

        User::truncate();

        $user = new User();
        $user->role_as = 'admin';
        $user->name = 'Mr.Super';
        $user->lname = 'Admin';
        $user->photo = 'avatar.png';
        $user->phone = '+880 123654789';
        $user->email = 'superadmin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_as = 'userPost';
        $user->name = 'Mr. vua';
        $user->lname = 'Admin';
        $user->photo = 'avatar.png';
        $user->phone = '+880 123654789';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_as = '';
        $user->name = 'Mr. vua';
        $user->lname = 'modarator';
        $user->photo = 'avatar.png';
        $user->phone = '+880 123654789';
        $user->email = 'modarator@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_as = '';
        $user->name = 'Mr. vua';
        $user->lname = 'user';
        $user->photo = 'avatar.png';
        $user->phone = '+880 123654789';
        $user->email = 'user@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user = new User();
        $user->role_as = '';
        $user->name = 'Mr. vua';
        $user->lname = 'subscriber';
        $user->avatar = 'avatar.png';
        $user->phone = '+880 123654789';
        $user->email = 'subscriber@gmail.com';
        $user->password = Hash::make('12345678');
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->save();
    }
}
