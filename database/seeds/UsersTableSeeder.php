<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        // Only seed if not in production environment
        if (!App::environment('production')) {
            $payload = [
                ['Admin', 'admin@sankine.com'],
            ];
            foreach ($payload as $user) {
                User::create([
                    'name'     => $user[0],
                    'email'    => $user[1],
                    'password' => bcrypt(isset($user[4]) ? $user[4] : '123456')
                ]);
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}