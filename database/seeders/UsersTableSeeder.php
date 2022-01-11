<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole      = Role::where('name','admin')->first();
        $userRole       = Role::where('name','student')->first();
        $instructorRole = Role::where('name','instructor')->first();


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mse.com',
            'password' => Hash::make('secret'),
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@mse.com',
            'password' => Hash::make('secret'),
        ]);

        $instructor = User::create([
            'name' => 'Instructor',
            'email' => 'instructor@mse.com',
            'password' => Hash::make('secret'),
        ]);

        $admin->role()->attach($adminRole);
        $user->role()->attach($userRole);
        $instructor->role()->attach($instructorRole);



        // DB::table('users')->insert([
        //     'name' => 'Admin Admin',
        //     'email' => 'admin@argon.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('secret'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
