<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\Repo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        //$this->call('RepoTableSeeder');
        $this->call('MessageTableSeeder');

        Model::reguard();
    }
}

/**
* 
*/

/**
*  
*/
class MessageTableSeeder extends Seeder
{
    
    public function run()
    {
        for($i = 0; $i < 4; $i++){
            Message::create([
                'message' => 'When are you coming for shopping' .$i,
                'repo_id' => 1
            ]);
        }

        for($i =4; $i < 6; $i++){
            Message::create([
                'message' => 'When are you coming for shopping' .$i,
                'repo_id' => 2
            ]);
        }
    }
}

class RepoTableSeeder extends Seeder
{
    
    public function run()
    {
        Repo::create([
            'user_id' => '1',
            'message' => 'When will you be back from shopping',
            'completed' => '0'
        ]);

        Repo::create([
            'user_id' => '2',
            'message' => 'Go for fishing',
            'completed' => '1'
        ]);
    }
}
