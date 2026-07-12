<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PatientSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.test',
            'password' => Hash::make('password'),
        ]);
        $admin->assign('admin');

        $dokter = User::factory()->create([
            'name' => 'dr. Yoga Darmawan',
            'email' => 'dokter@klinik.test',
            'password' => Hash::make('password'),
            'sip' => '1234567890',
        ]);
        $dokter->assign('dokter');

        $perawat = User::factory()->create([
            'name' => 'Sabila Nurul Putri',
            'email' => 'perawat@klinik.test',
            'password' => Hash::make('password'),
        ]);
        $perawat->assign('perawat');

        $practitioners = [$dokter, $perawat];

        Schedule::factory(30)->create([
            'user_id' => fn () => $practitioners[array_rand($practitioners)]->id,
        ]);

        Schedule::where('status', 'selesai')->each(function (Schedule $schedule): void {
            Transaction::factory()->create([
                'schedule_id' => $schedule->id,
            ]);
        });
    }
}
