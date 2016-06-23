<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\Repo;
use App\Accessory;
use App\Category;

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
        $this->call('AccessoryTableSeeder');
        $this->call('CategoryTableSeeder');

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

class AccessoryTableSeeder extends Seeder
{
    
    public function run()
    {
        Accessory::create([
            'name' => 'weave',
            'category_id' => 1
        ]);

        Accessory::create([
             'name' => 'stationery',
            'category_id' => 2
        ]);

         Accessory::create([
            'name' => 'jewellery',
            'category_id' => 1
        ]);

        Accessory::create([
             'name' => 'bag',
            'category_id' => 1
        ]);

         Accessory::create([
            'name' => 'bed',
            'category_id' => 2
        ]);

        Accessory::create([
             'name' => 'chairs',
            'category_id' => 2
        ]);

         Accessory::create([
            'name' => 'flowers',
            'category_id' => 3
        ]);

        Accessory::create([
             'name' => 'mattress',
            'category_id' => 2
        ]);

         Accessory::create([
            'name' => 'wedding cake',
            'category_id' => 3
        ]);

        Accessory::create([
             'name' => 'wedding dress',
            'category_id' => 3
        ]);

         Accessory::create([
            'name' => 'ring',
            'category_id' => 3
        ]);

        Accessory::create([
             'name' => 'socks',
            'category_id' => 1
        ]);

         Accessory::create([
             'name' => 'shoes',
            'category_id' => 1
        ]);
    }
}

class CategoryTableSeeder extends Seeder
{
    
    public function run()
    {
        Category::create([
            'name' => 'Fashion'
        ]);

        Category::create([
            'name' => 'Home'
        ]);

        Category::create([
            'name' => 'Wedding'
        ]);
    }
}