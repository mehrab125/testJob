<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function Insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'category' => ['required', 'exists:App\Models\Categories,id'],
            'file' => ['required']
        ]);

        if ($validator->fails()) {
           return response([
               "error" => true,
               "message" => $validator->messages(),
           ],422);
        }
        $posts = new Posts();
        $posts->user_id=1;
        $posts->title=$request->title;
        $posts->category_id=$request->category;
        $posts->description=$request->description;
        $posts->save();

        $files=Files::where('user_id','=',1)->get();
        if($files->isNotEmpty()){
            $files->toQuery()->update([
                'type_id'=>$posts->id,
                'type'=>'posts',
            ]);
        }

        return response([
            "error" => false,
            "message" => __("InsertPostSuccess"),
            "content"=>[
                'id'=>$posts->id
            ]
        ],200);
    }
}
