<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo;

use App\Repositories\Repo\TodoRepo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;

class RepoController extends Controller
{
	/**
    *@var TodoRepo;
    **/

    private $todoRepo;

    public function __construct(TodoRepo $todoRepo){

    	$this->todoRepo = $todoRepo;
    }


    public function getMessage(){

        // update Repo using eloquent

        $repo = Repo::find(2);
        $repo->message = "How to ride a car";
        $repo->save();
        return 'Saved new message as ' .$repo->message;

        // for multiple repos
        $messages = Repo::where('id', '>', 1)->get();

        // for single repositories
        $messages = Repo::find(1)->messages()->get();
        foreach ($messages as $message) {

            var_dump($message->message);
        }
        
    }

    // inverse rlship
    public function getRepo(){
        $repo = Message::find(1);
        dd($repo->message);
    }

    public function getAllRepos(){

    	return $this->todoRepo->getAll();
    }
}
