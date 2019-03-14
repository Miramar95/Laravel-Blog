<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Http\Requests\Post\StorePostRequest;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }



    public function create()
    {
        // $users = User::all();
        return view('posts.create');
    }
    public function store(StorePostRequest $request){
        Post::create(request()->all());
        return redirect()->route('posts.index');
    }

        public function show(Post $post)
    {
             return view('posts.show', [
            'post' => $post
        ]);
    }

        public function edit(Post $post)
    {
        // $post = Post::where('id',$post)->get()->first();
        //select * from posts where id=1 limit 1;
        // $post = Post::where('id',$post)->first();
        // $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update ($post){
    		$data= request()->all();
           	Post::where('id',$post)->update([
           		'title'=> $data['title'],
           		'description'=> $data['description'],
           		'userName'=> $data['userName'],
           	]);

           	return redirect('posts');
    }

        public function destroy($id)
    {
        // delete
        $post = Post::find($id);
        $post->delete();
		 return view('posts.index', [
            'posts' => Post::all()
        ]);
    }


}	