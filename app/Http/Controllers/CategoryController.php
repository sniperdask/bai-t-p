<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        // return view('Admin.category.index');
        // $data = DB::table('categories')->paginate(5);
        // return view('Admin.category.index'.['categoryData'=>$data]);
        $categoryData =DB::table('categories')->where('name','like','%'.$request->search.'%')
        ->paginate(5)
        ->appends(['search'=>$request->search]);

        // $data = Category:: select('id','name')->orderBy('id','DESC')->paginate(5);
        // return view("Admin.category.index",[
        //     'categories' =>  $data
        // ]);

    
        return view('Admin.category.index',compact('categoryData'));
        // $data = category::all()->toArray();
        // $data = category::all()->toJson();
       
        // lấy ra 1 iteam
         

        // lấy ra 1 item hàm cout
        // $data = category::all()->count();
        // dd($data);
        // thêm dữ liệu vào bảng
        // $data = new category();
        // $data->name = 'tin tức';
        // $data->save();
        // dd($data);

        // category::create([
        //     'name' => 'tin tức khuyến mại',
        //     'slug'=> 'tin-tức-khuyến mại',
        // ]);

        // update dữ liệu
        // $data = category::destroy(57);
      
        // $data = category::find(4);
        // $data->name = 'tin tức khuyến mại 2';
        // $data->slug = 'tin-tức-khuyến-mại 2';
        // $data->save();
        // dd($data);
        // $data = DB::table('products')
        // ->select('id','name','slug')
        // ->where('id','<',20)
        // ->orwhere('name','mi band')->get();
        // dd($data);
            // $data = DB::table('products')
            // ->select('products.name','categories.name as TenDanhMuc')
            // ->join('categories','categories.id','=','products.category_id')
            // ->where('categories.id',6)
            // ->get();
            // dd($data);
            // $data = DB::table('categories')->insert([
            //     'name'=>'Linh kate'
               
            // ]);
            // dd($data);
            // $data = DB::table('categories')->where('id',54)->update(['name'=>'Linh']);
            // dd($data);
              

        // return view('Admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:posts|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    
            
        ]);


        $category = new Category();
        $category->name = $request->nameCategory;
        $category->slug = str_slug($request->nameCategory);
        if($request->hasFile('image')){
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName();
            // định nghĩa dẫn sẽ upload lên
            $path_upload = 'uploads/category/';
            $request->file('image')->move($path_upload,$filename);
            $category->image = $path_upload.$filename;
        }
        $category->save();
        return redirect()->route('category.index')->with('mess','thêm mới thành công');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = Category::find($id);
        return view('Admin.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        $category = Category::findorFail($id);
        $category->name = $request->input('nameCategory');
        $category->slug = str_slug($request->nameCategory);
        if($request->hasFile('new_image')){ // dòng này kiểm tra xem image có sử dụng được không
            // xóa file cũ
            @unlink(public_path($category->image)); // hàm unlink của php không phải của laravel 
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName();
            // định nghĩa dẫn sẽ upload lên
            $path_upload = 'uploads/category/';
            $request->file('new_image')->move($path_upload,$filename);
            $category->image = $path_upload.$filename;
        
        }
       
        $category->save();
        return redirect()->route('category.index')->with('mess','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
      
    }
}
