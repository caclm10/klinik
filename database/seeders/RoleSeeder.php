<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bouncer::role()->firstOrCreate(['name' => 'admin', 'title' => 'Administrator']);
        Bouncer::role()->firstOrCreate(['name' => 'dokter', 'title' => 'Dokter']);
        Bouncer::role()->firstOrCreate(['name' => 'perawat', 'title' => 'Perawat']);

        $adminAbilities = [
            'view-dashboard',
            'view-patients',
            'create-patients',
            'edit-patients',
            'delete-patients',
            'view-schedules',
            'create-schedules',
            'edit-schedules',
            'delete-schedules',
            'view-transactions',
            'create-transactions',
            'view-staff',
            'create-staff',
            'edit-staff',
            'delete-staff',
            'manage-account',
        ];

        foreach ($adminAbilities as $ability) {
            Bouncer::allow('admin')->to($ability);
        }

        Bouncer::allow('dokter')->to('view-own-schedule');
        Bouncer::allow('dokter')->to('manage-account');

        Bouncer::allow('perawat')->to('view-own-schedule');
        Bouncer::allow('perawat')->to('manage-account');

        Bouncer::cache();
    }
}
