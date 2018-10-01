<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\message;
use Intervention\Image\ImageManagerStatic as Image;

use Auth;
use App\Models\User;

class GuestController extends Controller
{
    
   
     
    public function index()
    {
         
      
        $data=[
            'title'=>'Гостевая книга',
            'pagetitle' =>'Гостевая книга',
         'message' =>message::latest()->paginate(2),
          'count'=>message::count(),
        
            
            
        ];
       
       $total=$data;
    return view('pages.messages.index', $data);
    }
    
    public function data()
    {
        Image::configure(array('driver' => 'gd'));
        $email=Auth::user()->email; //заменить на id
        $photo=Auth::user()->avatar;
       
        list($publicP, $avatarP, $fileP) = explode("/", $photo);
         
        
        $path= public_path('/storage/avatars/'.$fileP.'');
        $path2=public_path('/images/'.$email.'.png'); //поменять на id
      
        
       $data=[
            'title'=>'Гостевая книга',
            'pagetitle' =>'Гостевая книга',
         'message' =>message::latest()->paginate(2),
          'count'=>message::count(),
           'image'=>Image::make($path)->resize(100, 100)->save($path2),
        ];
      
        return ($data);
    }
    public function edit()
    {
        $data=[
            'title'=>'Изменить :Гостевая книга',
            'pagetitle' => 'Изменить : Гостевая книга',
            'count'=>message::count(),
              
                ];
        return view('pages.messages.edit', $data);
    }
    
    
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);
    }
    public function add(){
        $ldate = date('Y-m-d H:i:s');
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $message = request()->input('message');
        
        DB::table('messages')->insert(
        ['name' => $name, 
         'email' => $email,
         'message' => $message,
            'created_at' => $ldate,
            'updated_at' => $ldate
            ]);

        return view('pages.messages.addview'); 
    }
        public function editm(){
        return view('pages.messages.editform');
    }
    
    public function editadd(){
         $message = request()->input('message');
         $id=request()->input('id');
        DB::table('messages')
            ->where('id', $id)
            ->update(['message' => $message]);
  
        return view('pages.messages.editmessage');
    }

    public function del(){
        
        DB::table('messages')->where('id', '=', request()->input('id'))->delete();

        return view('pages.messages.del');
    }
   

    public function latest($column='created_at')
    {
        return $this->orderBy($column, 'desc');
        
    }
    public function oldest($column='created_at')
    {
        return $this->orderBy($column, 'asc');
        
    }
    
    
  
    

}
