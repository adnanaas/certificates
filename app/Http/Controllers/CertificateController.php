<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;

class CertificateController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['about','contact']]);
    }

        /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return ('all certificates 222 lkj');
        // $certificates = DB::table('certificates')->get();
        // return $certificates;
         // return Certificate::all();
         // return Certificate::findOrFail(1)->user_id;
        // $certificates= Certificate::all();
         // $certificates= Certificate::orderBy('created_at','DESC')->paginate(0);
         $certificates = DB::table('certificates')->simplePaginate(4);
        return view('cert.certificates',compact('certificates'));

    }

    public function contact()
    {
        return view('cert.contact');
    }
   public function about()
    {
        return view('cert.about');
    }

    public function create()
    {
        return view('cert.create');
    }

    
    public function store(Request $request)
    {
    //     if ($request->isMethod('POST')){
    //     $newcertificates=new Certificate;
    //     $newcertificates->name = $request->input('name');
    //     $newcertificates->filename = $request->input('filename');
    //     $newcertificates->user_id = $request->input('user_id');
    //     $newcertificates->save();
    // }
     //   $data=$request->validated();
        Certificate::create([
        'name'=> $request->name,
        'filename'=> $request->file('filename'),
        'user_id'=> $request->user_id

        ]);
    return redirect('/certificates');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
