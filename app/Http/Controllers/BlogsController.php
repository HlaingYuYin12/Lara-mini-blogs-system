<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BlogsController extends Controller
{
    //
    public function index() {

        return view('index');
    }

    //create blogs post
    public function create(Request $request){
        // dd($request->all());


        //check validation
        $this->checkBlogValidation($request);
        // dd('well done');

        $data = $this->requestBlogData($request);
        // dd($data);

        Blogs::create($data);

        // return back()->with(['createSuccess'=>'Blog create success....']);
        //or

        Alert::success('Blog create success.', 'Blog has been created');  //sweetalert
        return back();


    }

    //check blogs validation
    private function checkBlogValidation(Request $request){
        $validator = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'fee' => 'required',
            'address' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'rating' => 'required'
        ],[
            'title.required' => 'သေချာရေး'
        ]);
    }

    //request blog data
    private function requestBlogData($request){
        return [
           // user ရေးလိုက်တဲ့ဟာကို ထည့်  key သည် database(model) name နဲ့တူရမယ် $request->name သည် user ဘက်က name နဲ့တူရမယ်
            'title' => $request->title,
            'description' => $request->title,
            'fee' => $request->fee,
            'address' => $request->address,
            'rating' => $request->rating,
            //image error မတက်ဘူး
            'image' => null
        ];
    }
}
