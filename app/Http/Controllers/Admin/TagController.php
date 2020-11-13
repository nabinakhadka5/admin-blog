<?php

namespace App\Http\Controllers\Admin;



use App\Model\User\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    public $tag;
    public function __construct(Tag $tag){
        $this->tag = $tag;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = $this->tag->paginate(10);
        return view('admin.tag.index')->with('tag',$tag);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        if($this->tag->create($request->validated())){
            return redirect()->route('tag.index');
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
        $tag = $this->tag->find($id);
        return view('admin.tag.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTagRequest $request, $id)
    {
        $data = $request->validated();
        $tag = Tag::find($id);
        if($tag->update($data)){
            return redirect()->route('tag.index')->with('success','Category Updated Successfully');
        } else {
            return redirect()->route('tag.index')->with('error','Category couldnot be Updated');

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
        $data = $this->tag->find($id);
        if($data->delete()){
            return redirect()->route('tag.index')->with('success','tag deleted Successfully');

        } else {
            return redirect()->route('tag.index')->with('success','tag couldnote be deleted');

        }
    }
}
