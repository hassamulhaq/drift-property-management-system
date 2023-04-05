<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //$passwordHash = bcrypt('Pa$$w0rd');
        $passwordHash = 'Pa$$w0rd';

        $users = [
            ['id' => 1, 'name' => 'Super Admin', 'email' => 'superadmin@example.com', 'phone' => '+92XXXXXXXXX', 'country' => 'Pakistan', 'city' => 'Milwaukee', 'state' => 'WI', 'zip' => '53202', 'address' => '1234 Fake Address Drive', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'password' => $passwordHash, 'password_confirmation' => $passwordHash, 'created_at' => now()],
            ['id' => 2, 'name' => 'Admin', 'email' => 'admin@example.com', 'phone' => '+92XXXXXXXXX', 'country' => 'USA', 'city' => 'Juneau', 'state' => 'AK', 'zip' => '99501', 'address' => '2345 Fake Address Drive', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'password' => $passwordHash, 'password_confirmation' => $passwordHash, 'created_at' => now()],
            ['id' => 3, 'name' => 'Sales Agent', 'email' => 'salesagent@example.com', 'phone' => '+92XXXXXXXXX', 'country' => 'Korea', 'city' => 'Dalas', 'state' => 'AZ', 'zip' => '85001', 'address' => '3456 Fake Address Drive', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'password' => $passwordHash, 'password_confirmation' => $passwordHash, 'created_at' => now()],
            ['id' => 4, 'name' => 'Customer', 'email' => 'customer@example.com', 'phone' => '+92XXXXXXXXX', 'country' => 'Indonesia', 'city' => 'Unknown', 'state' => 'RT', 'zip' => '71601', 'address' => '4567 Fake Address Drive', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'), 'password' => $passwordHash, 'password_confirmation' => $passwordHash, 'created_at' => now()],
        ];

        $userRole = [
            1 => Role::SUPER_ADMIN,
            2 => Role::ADMIN,
            3 => Role::SALES_AGENT,
            4 => Role::CUSTOMER
        ];

        foreach ($users as $user) {
            $userExists = User::find($user['id']);
            if (!$userExists) {
                //$userObj = (new CreateNewUser())->create($user);

            $userObj = User::query()->updateOrCreate([
                'id' => $user['id']
            ], $user);

                if (isset($userRole[$userObj->id])) {
                    $userObj->assignRole(intval($userRole[$userObj->id]));
                }
            }
        }
    }
}
