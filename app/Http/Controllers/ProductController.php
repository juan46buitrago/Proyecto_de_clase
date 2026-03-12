<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $ProductList = Product::with('category')->limit(20)->orderBy('id','desc')->get();
        return view('product.index', ['misProductos' => $ProductList]);
    }

    public function create()
    {
        $categoryList = Category::all();
        return view('product.create', ['categories' => $categoryList]);
    }

    public function show($producto)
    {
        $p = Product::findOrFail($producto);
        return view('product.show', compact('p'));
    }

    public function store(Request $request)
    {
        //validacion
        $request ->validate([
        'nombre'=>'required|min:5|max:250',
        'precio'=>'required|numeric',
        'descripcion'=>'required',
        'imagen'=>'required|image',
        'categoria'=>'required|exists:categories,id'
        ]);
    
    
    
    
    $newproduct = new Product();
        $newproduct->name = $request->get('nombre');
        $newproduct->description = $request->input('descripcion');
        $newproduct->price = $request->input('precio');
        $newproduct->category_id = $request->input('categoria');

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images', 'public');
            $newproduct->image = $ruta;
        }

        $newproduct->save();
        return redirect()->route('product.index');
    }
}