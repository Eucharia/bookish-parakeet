<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Accessory;
use App\Accessory_Category;
use App\Exceptions\Handler;
use Response;
use Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function getAccessories($id)
    {
       // $category_id = Input::get('categories');
        //dd($category_id);
        $accessories = Accessory::select('name', 'category_id')
                            ->where('category_id', '=', $id)->get();        
        return Response::json(['success' => 'true', 'accessories' => $accessories ]);
    }

    public function getView(){
        $categories = Category::all();
        return view('accessory.accessory',['title' => 'Accessory View Page', 'categories' => $categories ]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Redirect('accessories')
                ->with('message', 'The accessories were successfully inserted');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
