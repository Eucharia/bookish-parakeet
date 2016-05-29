<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Storage;
use \Crypt;
use \Config\App;
use \Config\Filesystem;
use App\Fileentry;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Encryption\DecryptException; 
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Illuminate\Support\Facades\Redirect;
use Validator;
use Input;
  

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUpload(){
        $directory = config('app.fileDestinationPath');
        $files = Storage::files($directory);

        //$filename = pathinfo($files, PATHINFO_BASENAME);
        return view('uploads.files_uploads')
            ->with('title', 'Upload')
            ->with(array('files' => $files));
    }
    
    public function handleUpload(Request $request){
            if (Input::hasFile('file')) {
                if (Input::file('file')->isValid()) {
                    $file = Input::file('file');
                    $rules = [
                       'file' => 'required|max:10000|mimes:doc,docx,pdf'
                    ];
                    $this->validate($request, $rules);
                    $filename = $file->getClientOriginalName();
                    $path = $file->getRealPath();
                    $destinationPath = config('app.fileDestinationPath').'/'.$filename;
                    $encryptedFile = Crypt::encrypt(file_get_contents($path));
                    $uploaded = Storage::put($destinationPath, $encryptedFile);
 
                   
                }              
            }        
            return Redirect('upload');       
     }
}
