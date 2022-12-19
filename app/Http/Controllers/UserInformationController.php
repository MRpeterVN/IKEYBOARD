<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInformationRequest;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class UserInformationController extends Controller
{
    //
    private $model;
    private $title;
    private $categories;
    public function __construct()
    {
        $this->model = new User();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $routeName = implode(' - ', $arr);
        $this->title = $routeName;
        $this->categories = Categories::all();
        View::share('title', $this->title);
        View::share('categories', $this->categories);
    }

    // public function index() 
    // {
    //     $categories = Categories::all();
    //     // $user = User::find($id);
    //     return view('clients.users.index');
    // }

    public function edit(Request $request)
    {
        // $data = $request->session()->all();
        // dd($data);
        $id = $request->session()->get('id');

        $user = $this->model->find($id);
        // dd($user);
        return view('clients.users.index', compact('user'));
    }

    public function processUpdateInfor(UserInformationRequest $request, $id) 
    {
        $id = $request->session()->get('id');

        $obj = $this->model->find($id);
        $check = $request->file('anh');
        $img= $obj['anh'];

        if (is_file($check)){
            $nameImg = time() . '_' . $request->file('anh')->getClientOriginalName();
            $request->anh->move(public_path('avt/user'),$nameImg);
        }
        else {
            $nameImg = $img;
        }
        
       

        $obj->update([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'password' => $request->get('password'),
            'avatar' => $nameImg,
           
        ]);

        return redirect()->route('personal-infor');

    }


}

