<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->insertUser();
        $this->updateUser();
        $this->insertUserCamel();
        $this->updateUserCamel();
    }

    private function insertUser(): User
    {
        $user = new User([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => new \DateTime()
        ]);

        $user->save();

        return $user;
    }

    private function updateUser(): void
    {
        $user = $this->insertUser();
        $user->name = 'Test';
        $user->email = 'test@gmail.com';
        $user->email_verified_at = new \DateTime();
        $user->save();
    }

    private function insertUserCamel(): User
    {
        $user = new User([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'emailVerifiedAt' => new \DateTime()
        ]);

        $user->save();

        return $user;
    }

    private function updateUserCamel(): void
    {
        $user = $this->insertUserCamel();
        $user->emailVerifiedAt = new \DateTime();

        $user->save();
    }
}
