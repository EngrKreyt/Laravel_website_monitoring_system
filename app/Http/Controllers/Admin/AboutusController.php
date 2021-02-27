<?php

namespace App\Http\Controllers\Admin;
use App\Models\Abouts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AboutusController extends Controller
{
    //
    public function index()
    {
      $aboutus = DB::table('Abouts')->paginate(14);
    //  $aboutus = Abouts::all();
      return view('admin.aboutus')
          ->with('aboutus',$aboutus)
      ;
    }
    public function store(Request $request)
    {
        $aboutus = new Abouts;

        $aboutus->title =$request->input('title');
        $aboutus->link=$request->input('link');
        $aboutus->description =$request->input('description');
        $aboutus->date=$request->input('date');
        $aboutus->time=$request->input('time');


        $aboutus->save();
        return redirect('/abouts')->with('status','Data Added Successfully');

    }
    public function edit($id)
    {
      $aboutus = Abouts::findOrFail($id);
      return view('admin.abouts.edit')
      ->with('aboutus',$aboutus)
     ;
    }
    public function update(Request $request, $id)
    {
      $aboutus =Abouts::findOrFail($id);
      $aboutus->title = $request ->input('title');
      $aboutus->link = $request ->input('link');
      $aboutus->description = $request ->input('description');
      $aboutus->date = $request ->input('date');
      $aboutus->time = $request ->input('time');

      $aboutus->update();
      return redirect('abouts')->with('status','Data Updated Successfully');


    }
    public function delete($id)
    {
      $aboutus=Abouts::findOrFail($id);
      $aboutus->delete();
      return redirect('abouts')->with('status','Data Successfully Deleted');
    }
}
