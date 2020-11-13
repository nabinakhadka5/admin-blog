<?php

namespace App\Http\Controllers\Admin;


use App\Model\User\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public $category;
    public function __construct(Category $category){
        $this->category = $category;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $this->category->paginate(10);
        return view('admin.category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if($this->category->create($request->validated())){
            return redirect()->route('category.index')->with('success','Category Added Successfully');
        } else {
            return redirect()->route('category.index')->with('success','Category counlnot be added');
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
        $data = Category::find($id);
        if($data) {
            return view('admin.category.edit')->with('category',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $data = $request->validated();
        $category = $this->category->find($id);
        if($category->update($data)){
            return redirect()->route('category.index')->with('success','Category updated Successfully');
        } else {
            return redirect()->route('category.index')->with('success','Category couldnot be updated');
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
        $data = $this->category->find($id);
        if($data->delete()){
            return redirect()->route('category.index')->with('success','Category deleted Successfully');
        } else {
            return redirect()->route('category.index')->with('success','Category couldnot be deleted');
        }

    }
}
