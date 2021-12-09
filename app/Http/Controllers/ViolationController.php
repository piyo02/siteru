<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Team;
use App\Models\Config;
use App\Models\Violation;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $violations = Violation::paginate(10);
        return view('pages.violations.index', [
            'page' => 'Surat Pelanggaran',
            'violations' => $violations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Config::where('shortcode', 'NM-KBD-PR')->first();
        $employee_number = Config::where('shortcode', 'NIP-KBD-PR')->first();
        $teams = Team::all();
        
        return view('pages.violations.form', [
            'action' => '/admin/violations',
            'page' => 'Buat Surat Pelanggaran',
            'name' => $name,
            'employee_number' => $employee_number,
            'teams' => $teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Config::where('shortcode', 'NM-KBD-PR')->first();
        $employee_number = Config::where('shortcode', 'NIP-KBD-PR')->first();

        $validatedData = $request->validate([
            'violations' => 'required',
            'activity' => 'required',
            'offender' => 'required',
            'street' => 'required',
            'village' => 'required',
            'districts' => 'required',
            'long' => 'required',
            'lat' => 'required',
        ]);
        $validatedData['warn'] = $request->warn;
        $validatedData['type'] = $request->type;
        $validatedData['team_id'] = $request->team_id;

        $validatedData['number'] = '650/001/002/TIM 7/PUPR-PR/2021';
        $validatedData['name'] = $name->value;
        $validatedData['employee_number'] = $employee_number->value;
        $validatedData['created_by'] = auth()->user()->id;
        
        $violation = Violation::create($validatedData);
        return redirect('/admin/violations/' . $violation->id . '/edit')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function show(Violation $violation)
    {
        return view('pages.violations.detail', [
            'page' => 'Detail Surat Pelanggaran',
            'violation' => $violation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function edit(Violation $violation)
    {
        // $violations = Violation::where('violation_id', '=', $violation->id)->get();
        $attachments = Attachment::where('violation_id', '=', $violation->id)->get();
        $teams = Team::all();
        return view('pages.violations.detail', [
            'page' => 'Detail Surat Pelanggaran',
            'violation' => $violation,
            'attachments' => $attachments,
            'teams' => $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {
        $validatedData = $request->validate([
            'regarding' => 'required',
            'offender' => 'required',
            'activity' => 'required',
            'street' => 'required',
            'village' => 'required',
            'districts' => 'required',
        ]);
        Violation::where('id', $violation->id)
            ->update($validatedData);
        return redirect('/admin/violations/' . $violation->id . '/edit')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Violation  $violation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violation $violation)
    {
        //
    }

    public function add_signature(Request $request, Violation $violation)
    {
        $folderPath = storage_path('app/public/images/signatures/');
        $image_parts = \explode(';base64', $request->signed);
        $image_type_aux = \explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $name = strtolower($violation->offender) . uniqid() . '.' . $image_type;
        $file = $folderPath . $name;

        \file_put_contents($file, $image_base64);
        violation::where('id', $violation->id)->update([
            'signature' => 'images/signatures/' . $name
        ]);
        return redirect('/admin/violations/' . $violation->id . '/edit')->with('success', 'Berhasil');
// 
        // return back()->with('success', 'Tanda Tangan Berhasil ditambahkan');
    }

    public function add_attachment(Request $request, Violation $violation)
    {
        $validatedData = $request->validate([
            'attachment' => 'image|file',
        ]);
        $validatedData['violation_id'] = $violation->id;

        if( $request->file('attachment') ){
            $validatedData['attachment'] = $request->file('attachment')->store('images/violations');
            Attachment::create($validatedData);
        }
        
        return redirect('/admin/violations/' . $violation->id . '/edit')->with('success', 'Berhasil');
    }

    public function delete_attachment(violation $violation, Attachment $Attachment)
    {
        Attachment::destroy($Attachment->id);
        return redirect('/admin/violations/' . $violation->id . '/edit')->with('success', 'Berhasil');
    }

    public function export(Violation $violation) {
        $signature = Config::where('shortcode', 'TTD-KBD-PR')->first();
        // $violations = Violation::where('violation_id', '=', $violation->id)->get();
        $attachments = Attachment::where('violation_id', '=', $violation->id)->get();
        $regards = ['Teguran/Panggilan Pertama', 'Teguran/Panggilan'];

        $violations = explode(';', $violation->violations);
        
        $pages = array();
        $pages[] = View::make('exports.page1', [
            'signature'         => $signature,
            'violation' => $violation,
            'regards' => $regards,
            'violations' => $violations,
        ]);
        $pages[] = View::make('exports.page2', [
            'violation' => $violation,
            'attachments' => $attachments,
        ]);
        $pdf = PDF::loadView('exports.letter', ['pages' => $pages])
        ->setOption('page-width', '215.9')
        ->setOption('page-height', '355.6');
        return $pdf->stream('letter.pdf');
    }

    public function upload(Request $request)
    {
        $folderPath = public_path('upload/');
        $image_parts = \explode(';base64', $request->signed);
        $image_type_aux = \explode('image', $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;

        \file_put_contents($file, $image_base64);
        return back()->with('success', 'Tanda Tangan Berhasil ditambahkan');
    }
}
