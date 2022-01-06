<?php
namespace App\Database\Seeds;

use App\Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can directly create db records
        $user = new User();
        $user->username = "matthewjames3";
        $user->fullname = 'Matthew Reichardt';
        $user->email = "me@matthewreichardt.com";
        $user->password = md5("13qeadzc!#QEADZC");
        $user->phone = "8507379343";
        $user->save();

        // You can also use factories like this
        //(new UserFactory)->create(5)->save();

        // even better, you can use them together :-)
    }
}
