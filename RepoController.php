<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo;

use App\Repositories\Repo\TodoRepo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RepoController extends Controller
{
	/**
    *@var TodoRepo;
    **/

    private $todoRepo;

    public function __construct(TodoRepo $todoRepo){

    	$this->todoRepo = $todoRepo;
    }

    public function getAllRepos(){

    	return $this->todoRepo->getAll();
    }
}
