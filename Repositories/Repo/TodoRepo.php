<?php

namespace App\Repositories\Repo;

interface TodoRepo {
	
	public function getAll();

	public function getById($id);

	public function create(array $RepoAttributes);

	public function update($id, $RepoAttributes);

	public function delete($id);
}

?>