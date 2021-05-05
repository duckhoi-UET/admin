<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $cat = category::all();
        return view('admin/category/list', ['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $req)
    {
        $cat = new category;
        $cat->name = $req->name;
        $cat->save();
        return redirect('admin/category/add')->with('notify', 'Add category sucessfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        return view('admin/category/add');
    }

    public function getEdit($id)
    {
        $cat = category::find($id);
        return view('admin/category/edit', ['cat' => $cat]);
    }

    public function postEdit(Request $req,$id)
    {
        $cat = category::find($id);
        $this->validate($req, ['name' => 'required|unique:category,name|min:3'],
                                ['name.required' => "Category field is must",
                                'name.unique' =>"Category name has been existed",
                                'name.min' =>"Your category length must be greater than 3 characters"]);
        $cat->name = $req->name;
        $cat->save();
        return redirect('admin/category/edit/'.$cat->id)->with('notify', 'Edit category sucessfully!');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $cat = category::find($id);
        $cat->delete();
        return redirect('admin/category/list')->with('notify', 'Delete category sucessfully!');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
