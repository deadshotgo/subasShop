<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::query()->select(['id', 'name', 'show', 'created_at'])->get();
        return view('admin.brands.brand', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newBrand = new Brand();
            $newBrand->name = $request->name;
            $newBrand->show = $request->show;
            if ($request->feature_image) {
                $newBrand->images = $request->feature_image;
            }
            if ($request->title_m) {
                $newBrand->title_m = $request->title_m;
            } else {
                $newBrand->title_m = $request->name;
            }
            if ($request->description_n) {
                $newBrand->description_n = $request->description_m;
            } else {
                $newBrand->description_n = $request->name;
            }

            $newBrand->save();

            return redirect()->back()->with('message', 'Бренд було успішно добавлено');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Не вірно введені данні');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::query()->where('id', $id)->first();
        return view('admin.brands.edit', [
            'brand' => $brand,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::query()->where('id', $id)->first();
        $brand->name = $request->name;
        $brand->show = $request->show;

        $brand->images = $request->feature_image;

        $brand->title_m = $request->title_m;
        $brand->description_n = $request->description_m;
        $brand->save();
        return redirect()->back()->with('message', 'Бренд було успішно редаговано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Brand::where('id', $id)->first();
        $delete->delete();
        return redirect()->back()->with('message', 'Бренд було успішно видалено');
    }
}
