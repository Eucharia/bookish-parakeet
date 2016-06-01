<?php
	
namespace App\Repositories\Repo;
use App\Repo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container; 

class EloquentRepo implements TodoRepo {

	//@param Repo $model;

	protected $model;

	// inject the model here using constructor
	public function __construct(Repo $model){

		$this->model = $model;

	}

	public function getAll(){

		return $this->model->all();

	}

	public function getById($id){

		return $this->findById($id);

	}

	public function create(array $RepoAttributes){

		return $this->model->create($RepoAttributes);

	}

	public function update($id, $RepoAttributes){

		$repo = $this->model->findOrFail($id);
		$repo->update($RepoAttributes);
		return $repo;

	}

	public function delete($id){

		$this->getById($id)->delete();
		return true;

	}
	
}

?>