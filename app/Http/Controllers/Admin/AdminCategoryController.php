<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\categories;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $nombre = $request->get('name');
        // dd($nombre);
        $category = categories::where('name','like',"%$nombre%")->orderBy('name')->paginate(3);
        return view('admin.category.index', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new categories();
        $cat->name          = $request->nombre;
        $cat->slug          = $request->slug;
        $cat->description   = $request->descripcion;
        $cat->save();
        return redirect()->route('admin.category.index')->with('datos','Registro creado correctamente!');
        
        // return categories::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat = categories::where('slug',$slug)->firstOrFail();

        $editar = 'Si';

        return view('admin.category.show',compact('cat','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $cat = categories::where('slug',$slug)->firstOrFail();

        $editar = 'Si';

        return view('admin.category.edit',compact('cat','editar'));
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
        $cat = categories::findOrFail($id);
        $cat->name          = $request->nombre;
        $cat->slug          = $request->slug;
        $cat->description   = $request->descripcion;
        $cat->save();
        return redirect()->route('admin.category.index')->with('datos','Registro actualizado correctamente!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat= categories::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.category.index')->with('datos','Registro eliminado correctamente!');
    }
}
