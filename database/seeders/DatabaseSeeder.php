<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' =>'Admin User',
                'email' => env('USER_ADMIN_EMAIL'),
                'password' => bcrypt(env('USER_ADMIN_PASSWORD')),
                'email_verified_at' => now()
            ],
            [
                'name' =>'Moderador User',
                'email' => 'modelador@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now()
            ],
            [
                'name' =>'Financeiro nvl Primario',
                'email' => 'financeiro_one@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now()
            ],
            [
                'name' =>'Financeiro nvl Primario',
                'email' => 'financeiro_two@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now()
            ],
            [
                'name' =>'User low',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now()
            ]
        ];
        // \App\Models\User::factory(10)->create();

        foreach($users as $user){
            User::create($user);
        }
        $admin = BouncerFacade::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrador'
        ]);
        $mod = BouncerFacade::role()->firstOrCreate([
            'name' => 'Mod',
            'title' => 'Moderador'
        ]);
        $financNvPrimario = BouncerFacade::role()->firstOrCreate([
            'name' => 'financNvPrimario',
            'title' => 'Financeiro nvl Primario'
        ]);
        $financNvSecundario = BouncerFacade::role()->firstOrCreate([
            'name' => 'financNvSecundario',
            'title' => 'Financeiro nvl Secundario'
        ]);

        $control = BouncerFacade::ability()->firstOrCreate([
            'name' => 'control-all',
            'title' => 'Control all'
        ]);

        $viewRegister = BouncerFacade::ability()->firstOrCreate([
            'name' => 'view-registers',
            'title' => 'Views Registers'
        ]);

        $deleted = BouncerFacade::ability()->firstOrCreate([
            'name' => 'Deleted-registers',
            'title' => 'Deleted registers'
        ]);
        $edited = BouncerFacade::ability()->firstOrCreate([
            'name' => 'Edited-registers',
            'title' => 'Edited registers'
        ]);

        BouncerFacade::Allow($admin)->to($control);
        BouncerFacade::Allow($mod)->to($viewRegister);
        BouncerFacade::Allow($financNvPrimario)->to($deleted);
        BouncerFacade::Allow($financNvSecundario)->to($edited);

        $firstUser = User::first();
        $SecondUser = User::where('id', 2)->first();
        $thirdUser = User::where('id', 3)->first();
        $fourthUser = User::where('id', 4)->first();

        BouncerFacade::assign('admin')->to($firstUser);
        BouncerFacade::assign('mod')->to($SecondUser);
        BouncerFacade::assign('financNvPrimario')->to($thirdUser);
        BouncerFacade::assign('financNvSecundario')->to($fourthUser);

    }
}
