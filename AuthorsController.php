<?php namespace App\Http\Controllers;

	use App\Author;
	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Http\Request;

	use Validator;
	use Input;

	class AuthorsController extends Controller
	{
		public $restful = true;

		public function getIndex()
		{
			$view = view('authors.index', array('name' => 'Andrew Collins'))
				->with('age','35');
			$view->location = 'Nigeria';
			$view['profession'] = 'Doctor';
			return $view;
		}

		public function getBio(){
			return view('authors.bio')
				->with('title','Authors and Books')
				->with('authors', Author::orderBy('name', 'desc')->get());
		}

		public function getView($id){
			return view('authors.view')
				->with('title','Author View Page')
				->with('author', Author::find($id));
		}

		public function getNew(){
			return view('authors.new')
				->with('title', 'Add New Author');
		}

		public function create(){
			$validation = Author::validate(Input::all());
			if($validation->fails()){
				Redirect('new_author')->withErrors($validation)->withInput();
			} else {
				Author::create([
				'name' => Input::get('name'),
				'bio' => Input::get('bio')
				]);
				return Redirect('authors')
					->with('message', 'The author was created successfully');	
			}
			
		}

		public function getEdit($id){
			return view('authors.edit')
				->with('title', 'Edit Author')
				->with('author', Author::find($id));
		}

		public function getUpdate(Request $request){
			$id = Input::get('id');
			$validation = Author::validate(Input::all($id));
			if($validation->fails()){
				Redirect('edit_author', $id)->withErrors($validation);
			} else {
				Author::whereId($id)->update($request->except(['_method','_token']));
				return Redirect('authors')
					->with('message', 'The author was updated successfully');	
			}
		}
	}

?>