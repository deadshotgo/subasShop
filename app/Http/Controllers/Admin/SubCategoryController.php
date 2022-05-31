<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $new_sub_category = new Subcategory();
            $new_sub_category->title = $request->title;
            $new_sub_category->category_id = $request->category_id;
            $new_sub_category->images = $request->title;
            if($request->title_m){
                $new_sub_category->title_m = $request->title_m;
            }else {
                $new_sub_category->title_m = $request->title;
            }if($request->description_m){
                $new_sub_category->description_m = $request->description_m;
            }else{
                $new_sub_category->description_m = $request->title;
            }
            if($request->keyword_m ){
                $new_sub_category->keyword_m = $request->keyword_m;
            }else{
                $new_sub_category->keyword_m = $request->title;
            }

            $new_sub_category->save();

            return redirect()->back()->with('message', 'Підкатегорію було успішно добавлено');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
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

        $subCats = Subcategory::query()->select(['id','title','created_at'])->where('category_id',$id)->get();
        $cat_name = Category::query()->select(['id','title'])->where('id',$id)->first();
        return view('admin.subcat.subcategory',[
            'subCats' => $subCats,
            'cat_name' => $cat_name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCat = Subcategory::query()->where('id',$id)->first();
        return view('admin.subcat.edit',[
            'subCat' => $subCat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCategory = Subcategory::query()->where('id',$id)->first();
        $subCategory->title = $request->title;
        $subCategory->title_m = $request->title_m;
        $subCategory->description_m = $request->description_m;
        $subCategory->keyword_m = $request->keyword_m;
        $subCategory->save();
        return redirect()->back()->with('message', 'Категорію було успішно редаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCat = Subcategory::where('id',$id)->first();
        $subCat->delete();
        return redirect()->back()->with('message', 'Категорію було успішно видалено');
    }

    public function MyCreate($id){
        $catId = Category::query()->where('id',$id)->first();
        return view('admin.subcat.create',[
            'catId' => $catId,
        ]);
    }

}
