<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    public $role;
    public $sector_id;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->role = Auth::user()->role->name;
            $this->sector_id = Auth::user()->sector_id;
            
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( $this->role == 'User Sector' ){
            $policies = Policy::where('sector_id', $this->sector_id)->latest()->paginate(10);
            $sectors = Sector::where('id', $this->sector_id)->get();
        } else {
            $policies = Policy::latest()->paginate(10);
            $sectors = Sector::all();
        }
        return view('pages.policies.index', [
            'page' => 'Kebijakan',
            'policies' => $policies,
            'sectors' => $sectors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Ilpdfluminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'sector_id' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        $slug = \Str::slug($request->title, '-');

        if( $request->file('file') ){
            $validatedData['file'] = $request->file('file')->store('uploads/policies');
        }

        try {
            $validatedData['slug'] = $slug;
            $validatedData['created_by'] = auth()->user()->id;
            $validatedData['sector_id'] = $request->sector_id;

            Policy::create($validatedData);
            $status = 'success';
            $message = 'Berhasil Membuat Kebijakan';
        } catch (\Exception $exception) {
            // dd($exception);
            $status = 'error';
            $message = 'Gagal Membuat Kebijakan';
        }

        return redirect('/admin/publication/policies')->with($status, $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if( $request->file('file') ){
            $validatedData['file'] = $request->file('file')->store('uploads/policies');
        }

        try {
            Policy::where('id', $policy->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengupdate Kebijakan';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Mengupdate Kebijakan';
        }

        return redirect('admin/publication/policies')->with('status', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        Policy::destroy($policy->id);
        return redirect('admin/publication/policies')->with('status', 'Berhasil');
    }
}
