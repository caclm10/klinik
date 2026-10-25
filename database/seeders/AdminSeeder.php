<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.test',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'birth_place' => null,
            'birth_date' => null,
            'gender' => null,
            'sip' => null,
        ]);
	
	$admin->assign('admin');
    }
}
