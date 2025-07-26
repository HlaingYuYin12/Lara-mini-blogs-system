<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BlogsController extends Controller
{
    //
    public function index() {
        // dd(request('searchKey'));

        // $data = Blogs::select('*')
        //             ->orderBy('created_at','desc')
        //             // ->where('id','=','1')
        //             // ->get(); //collection
        //             ->paginate(3);

        $data = BLogs::when(request('searchKey'),function($query){ //$query ----> ရှေ့ရောနောက်ရောဆက်မယ်
            $searchKey = request('searchKey');
            // $query->orWhere('title','like','%'.$searchKey.'%');
            // $query->orWhere('description','like','%'.$searchKey.'%');
            // $query->orWhere('address','like','%'.$searchKey.'%');
            // $query->orWhere('rating','like','%'.$searchKey.'%');
            // $query->orWhere('fee','like','%'.$searchKey.'%');
            // or

            $query->whereAny(['title','description','address','rating','fee'],'like','%'.$searchKey.'%');
        })->orderBy('created_at','desc')
          ->paginate(3);   //can be use 'data table' js library

        // dd($data->toArray());
        // dd($data);

        return view('index',compact('data')); //database ကတန်ဖိုးဆွဲ
    }

    //create blogs post
    public function create(Request $request){
        // dd($request->all());


        //check validation
        $this->checkBlogValidation($request);
        // dd('well done');

        $data = $this->requestBlogData($request);
        // dd($data);



        // $request->title; //string ဖမ်းတဲ့ပုံစံ
        // $request->file('image'); //file ခေါ်တဲ့ပုံစံ
        // $request->header('key'); //header ကတန်ဖိုးဖမ်းတဲ့ပုံစံ

        if($request->hasFile('image')){
            // dd('choose image');
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/uploads/' , $fileName);  //storage_path() လဲရ
            $data['image']= $fileName; //in database

        }


        Blogs::create($data);

        // return back()->with(['createSuccess'=>'Blog create success....']);
        //or

        Alert::success('Blog create success.', 'Blog has been created');  //sweetalert
        return back();


    }

    //delete blogs
    public function delete($id){
        // dd($id);
        // Blogs::where('id',$id)->delete();
        //or
        $oldImageName = Blogs::where('id',$id)->first('image');
        $oldImageName = $oldImageName['image'];
        // dd($oldImageName);

        if( file_exists ( public_path('/uploads/'.$oldImageName) )){
            // dd('it is here');
            unlink(public_path('/uploads/'.$oldImageName));
        }
        // else{
        //     dd('empty image');
        // }


        Blogs::findOrFail($id)->delete();
        Alert::success('Delete success', 'Your blogs has been deleted');

        return back();
    }


    //blog details
    public function detail($id){
        // dd($id);

        $data = Blogs::where('id',$id)->first();
        // dd($data->toArray());


        // return view('detail')->with(['item'=>$data]);
        //or
        return view('detail',compact('data'));
    }


    //edit blogs
    public function edit($id){
        $data = Blogs::where('id',$id)->first();
        return view('update',compact('data'));
    }


    //update blogs
    public function update(Request $request){
        dd($request->all());
    }



    //check blogs validation
    private function checkBlogValidation(Request $request){
        $validator = $request->validate([
            'title' => 'required', //name from client
            'description' => 'required',
            'fee' => 'required',
            'address' => 'required',
            'image' => 'mimes:png,jpg,jpeg|file',
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
            'description' => $request->description,
            'fee' => $request->fee,
            'address' => $request->address,
            'rating' => $request->rating,
            //image error မတက်ဘူး
            // 'image' => null
        ];
    }



}
