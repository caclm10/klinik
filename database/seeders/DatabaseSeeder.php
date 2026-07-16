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
            'phone' => '081234567890',
            'birth_place' => null,
            'birth_date' => null,
            'gender' => null,
            'sip' => null,
        ]);
        $admin->assign('admin');

        $practitioners = collect();

        for ($i = 0; $i < 50; $i++) {
            $role = fake()->randomElement(['dokter', 'perawat']);
            $title = $role === 'dokter' ? 'dr. ' : '';

            $practitioner = User::factory()->practitioner()->create([
                'name' => $title.fake()->name(),
                'email' => fake()->unique()->safeEmail(),
            ]);
            $practitioner->assign($role);

            $practitioners->push($practitioner);
        }

        Schedule::factory(30)->create([
            'user_id' => fn () => $practitioners->random()->id,
        ]);

        Schedule::query()->where('status', 'selesai')->each(function (Schedule $schedule): void {
            if (fake()->boolean(60)) {
                Transaction::factory()->create([
                    'schedule_id' => $schedule->id,
                ]);
            }
        });
    }
}
