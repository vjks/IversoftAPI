<?php



use Illuminate\Database\Seeder;
use App\Blog_Posts;
use App\Users;
use App\User_Roles;
use App\User_Addresses;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //Blog_Posts::truncate();
        Users::truncate();
        User_Roles::truncate();
        User_Addresses::truncate();
        User::truncate();

        Eloquent::unguard();

        //$this->call('UserTableSeeder');
        //$this->command->info('User table seeded!');

        $path = 'app/developer_docs/test_db_2017-05-24.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('All tables seeded!');
    }
}