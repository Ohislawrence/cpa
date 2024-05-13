<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Blogcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Blogcategory::all();
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.list',compact('blogs','cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Blogcategory::all();
        return view('admin.blogs.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs,title',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('blogimages'), $imageName);



        Blog::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->title),
            'desc' => $request->input('content'),
            'banner' => $imageName,
            'user_id'=> auth()->user()->id,
            'category' => $request->input('category'),
        ]);
        

        return redirect()->route('admin.blogs.index')
                        ->with('message','Blog created successfully');
    }

    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('media'), $fileName);
      
            $url = asset('media/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cat = Blogcategory::all();
        return view('admin.blogs.list', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('blogimages'), $imageName);

        $upblog = Blog::findorfail($id);

        $upblog->update([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->title),
            'desc' => $request->input('content'),
            'banner' => $imageName,
            'user_id'=> auth()->user()->id,
            'category' => $request->input('category'),
        ]);

        return redirect()->route('blogs.index')
                        ->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()
                        ->with('success','Deleted successfully');
    }


    public function getblogs(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="blog/'.$row->id.'/show" class="edit btn btn-primary btn-sm">View</a>
                                    <a href="blog/'.$row->id.'/update" class="edit btn btn-success btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('role',function($row){
                    $role = $row->getRoleNames()->first();
                    return $role;
                })
                ->rawColumns(['action','role'])
                ->make(true);
        }
    }
}
