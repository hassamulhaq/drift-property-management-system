<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'first_name' => 'super admin',
                'phone' => '123456789',
                'country' => 'Pakistan',
                'city' => 'Lahore',
                'state' => 'Punjab',
                'zip' => '540000',
                'address' => 'N/A',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'first_name' => 'admin',
                'phone' => '112345678',
                'country' => 'USA',
                'city' => 'Juneau',
                'state' => 'AK',
                'zip' => '99501',
                'address' => '2345 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Manager',
                'email' => 'manager@example.com',
                'first_name' => 'manager',
                'phone' => '345678912',
                'country' => 'USA',
                'city' => 'Little Rock',
                'state' => 'AR',
                'zip' => '71601',
                'address' => '4567 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Agent',
                'email' => 'agent@example.com',
                'first_name' => 'agent',
                'phone' => '234567891',
                'country' => 'USA',
                'city' => 'Phoenix',
                'state' => 'AZ',
                'zip' => '85001',
                'address' => '3456 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('p@SSw0rD'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'Client',
                'email' => 'client@example.com',
                'first_name' => 'client',
                'phone' => '456789123',
                'country' => 'USA',
                'city' => 'Sacramento',
                'state' => 'CA',
                'zip' => '90001',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'Agent SR',
                'email' => 'sr@example.com',
                'first_name' => 'SR Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => 'Agent ASM',
                'email' => 'asm@example.com',
                'first_name' => 'ASM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'name' => 'Agent SM',
                'email' => 'sm@example.com',
                'first_name' => 'SM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 9,
                'name' => 'Agent BM',
                'email' => 'bm@example.com',
                'first_name' => 'BM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'name' => 'Agent GM',
                'email' => 'gm@example.com',
                'first_name' => 'RM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 10,
                'name' => 'Agent ZM',
                'email' => 'zm@example.com',
                'first_name' => 'ZM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 12,
                'name' => 'Agent RM',
                'email' => 'rm@example.com',
                'first_name' => 'RM Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 13, // don't change to user-id of NSA account as, we use user-id:13 for commissions left by missing agent-roles
                'name' => 'Agent NSA',
                'email' => 'nsa@example.com',
                'first_name' => 'National Sales Agent',
                'phone' => '',
                'country' => 'PK',
                'city' => 'Lahore',
                'state' => '',
                'zip' => '540000',
                'address' => '6789 Fake Address Drive',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        $userRole = [
            1 => Role::SUPER_ADMIN,
            2 => Role::ADMIN,
            3 => Role::MANAGER,
            4 => Role::AGENT,
            5 => Role::USER,
            6 => Role::SALE_REPRESENTATIVE,
            7 => Role::ASSISTANT_SALE_MANAGER,
            8 => Role::SALE_MANAGER,
            9 => Role::BUSINESS_MANAGER,
            10 => Role::GROUP_MANAGER,
            11 => Role::ZONAL_MANAGER,
            12 => Role::REGIONAL_MANAGER,
            User::NATIONAL_SALE_DIRECTOR_USER_ID ?? 13 => Role::NATIONAL_SALE_DIRECTOR, // don't change to user-id of NSA account as, we use user-id:13 for commissions left by missing agent-roles
        ];
        foreach ($users as $user) {
            $userObj = User::query()
                ->updateOrCreate([
                    'id' => $user['id']
                ], $user);
            if (isset($userRole[$userObj->id])) {
                $userObj->assignRole(intval($userRole[$userObj->id]));
            }
        }
    }
}
