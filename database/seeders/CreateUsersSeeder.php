<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $professeurs =[
                    'nom'=>'sedki',
                   'prenom'=> 'sedki',
                   'email'=>'sedki@gmail.com',
                   'password'=> bcrypt('123456'),
                   'username'=>'sedki',
                   'type'=>2,
        ];
        $users = [
            [
                'nom'=>'ADMIN',
               'prenom'=> 'admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('123456'),
               'username'=>'admin',
               'type'=>1,
            ],
            [
                'nom'=>'abdo',
                'prenom'=> 'elfadili',
                'email'=>'abdo@gmail.com',
                'password'=> bcrypt('123456'),
                'username'=>'professeur',
                'type'=>2,
            ],
            [
               'nom'=>'hamza',
               'prenom'=> 'kaissouni',
               'email'=>'etudiant@gmail.com',
               'password'=> bcrypt('123456'),
               'username'=>'etudiant',
               'type'=>0,
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}