<?php

namespace App\Http\Controllers\Admin;


use App\Model\User\Tag;
use App\Model\User\Post;
use App\Model\User\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public $post = null;

    public function __construct(Post $post){
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->post = $this->post->paginate();
        return view('admin.post.index')->with('post',$this->post);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post', [
            'post' => $this->post,
            'categories' => Category::get(['id', 'name']),
            'tags' => Tag::get(['name', 'id'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = (new Post)->fill($request->validated());
        if($request->hasFile('image')){
        $imageName =  $request->image->store('public');            }
        $post->image =$imageName;
        $status = $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        if ($status) {
            return redirect()->route('post.index')->with('success','post added successfully');
        } else {
            return redirect()->route('post.index')->with('error','post couldnot be addes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.post.edit', [
            'post' => $this->post->find($id),
            'categories' => Category::get(['id', 'name']),
            'tags' => Tag::get(['name', 'id'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
            ]);

            if($request->hasFile('image')){
            $imageName =  $request->image->store('public');
        $post = Post::find($id);
        $post->image =$imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
        $data = $request->validated();
        $status = $this->post->update($data);
        $this->post->tags()->sync($request->tags);

        $this->post->categories()->sync($request->categories);
        if($status){
            return redirect()->route('post.index')->with('success','post updated successfully');
        } else{
            return redirect()->route('post.index')->with('error','post couldnot be updated');

        }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}
