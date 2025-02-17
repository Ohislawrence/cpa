<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appcategory;
use App\Models\Apptype;
use App\Models\Integration;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Carbon\Carbon;

class IntegrationController extends Controller
{
    public function postdb(Request $request)
    {
        $validated = $request->validate([
            'appname' => 'required|string',
            'fimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fimageName = Str::slug($request->appname).'-'.time().'.'.$request->fImage->extension();
        $request->fImage->move(public_path('images/integration/fimages'), $fimageName);

        if($request->hasFile('icon')){
        $icon = 'icon'.Str::slug($request->appname).'-'.time().'.'.$request->icon->extension();
        $request->icon->move(public_path('images/integration/icons'), $icon);
        }
        
        

        Integration::create([
            'appname' => $request->appname,
            'slug' => Str::slug($request->appname),
            'icon' => $icon ?? 'none',
            'desc' => $request->desc,
            'fImage' => $fimageName,
            'shortDesc' => $request->shortDesc,
            'appcategory_id' => $request->appcategory_id,
            'apptype_id' => $request->apptype_id,
            'support_id' =>$request->support_id,
        ]);
        return redirect()->back()->with('message', 'Integration created');
    }

    public function showAll()
    {
        return view('admin.integrations.show');
    }

    public function create()
    {
        $categories = Appcategory::all();
        $types = Apptype::all();
        $supports = Support::all();
        return view('admin.integrations.create', compact('categories', 'types', 'supports'));
    }

    public function edit($id)
    {
        $integration = Integration::findorfail($id);
        $categories = Appcategory::all();
        $types = Apptype::all();
        $supports = Support::all();
        return view('admin.integrations.edit', compact('categories', 'types', 'integration','supports'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $integration = Integration::findorfail($id);
        $slug = Str::slug($request->appname);

        if($request->hasFile('fImage')){
            $fimageName = $slug.'-'.time().'.'.$request->fimage->extension();
            $request->fimage->move(public_path('images/integration/fimages'), $fimageName);
            $integration->fImage = $fimageName;
            $integration->save();
        }

        if($request->hasFile('icon')){
            $iconName = 'icon'.$slug.'-'.time().'.'.$request->icon->extension();
            $request->icon->move(public_path('images/integration/icons'), $iconName);
            $integration->icon = $iconName;
            $integration->save();
        }
       
       
        $integration->update([
            'appname' => $request->appname,
            'slug' => $slug,
            'desc' => $request->desc,
            'shortDesc' => $request->shortDesc,
            'appcategory_id' => $request->appcategory_id,
            'apptype_id' => $request->apptype_id,
            'support_id' =>$request->support_id,
        ]);

        return redirect()->back()
                        ->with('message','Integration updated successfully');
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

    public function destroy($id)
    {
        $integration = Integration::find($id);
        $integration->delete();
        return redirect()->back()
                        ->with('success','Deleted successfully');
    }

    public function getIntegration(Request $request)
    {
        if ($request->ajax()) {
            $data = Integration::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/admin/app/integration/edit/'.$row->id.'" class="btn btn-danger btn-sm" title="Hapus User"  ><i class="fa fa-edit "></i></a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Edit" onclick="hapus('.$row->id.')" ><i class="fa fa-trash "></i></a>';
                    return $actionBtn;
                })
                ->addColumn('date', function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                    return $date;
                })
                ->addColumn('category', function($row){
                    $category = $row->appcategory->name;
                    return $category;
                })
                ->addColumn('support', function($row){
                    $support = $row->support->name;
                    return $support;
                })
                ->rawColumns(['action','date','category','support'])
                ->make(true);
        }
    }
}
