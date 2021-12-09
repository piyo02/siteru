<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Config;
use App\Models\Violation;
use Illuminate\Http\Request;
use App\Models\ViolationLetter;
use App\Models\AttachmentLetter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class ViolationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $violation_letters = ViolationLetter::paginate(10);
        return view('pages.violations.index', [
            'page' => 'Surat Pelanggaran',
            'violation_letters' => $violation_letters,
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
        
        return view('pages.violations.form', [
            'action' => '/admin/violations',
            'page' => 'Buat Surat Pelanggaran',
            'name' => $name,
            'employee_number' => $employee_number,
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
            'regarding' => 'required',
            'offender' => 'required',
            'activity' => 'required',
            'street' => 'required',
            'village' => 'required',
            'districts' => 'required',
        ]);
        $validatedData['number'] = '650/001/002/TIM 7/PUPR-PR/2021';
        $validatedData['name'] = $name->value;
        $validatedData['employee_number'] = $employee_number->value;
        $validatedData['created_by'] = auth()->user()->id;
        
        $violationLetter = ViolationLetter::create($validatedData);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViolationLetter  $violationLetter
     * @return \Illuminate\Http\Response
     */
    public function show(ViolationLetter $violationLetter)
    {
        return view('pages.violations.detail', [
            'page' => 'Detail Surat Pelanggaran',
            'violation_letter' => $violationLetter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViolationLetter  $violationLetter
     * @return \Illuminate\Http\Response
     */
    public function edit(ViolationLetter $violationLetter)
    {
        $violations = Violation::where('letter_id', '=', $violationLetter->id)->get();
        $attachment_letters = AttachmentLetter::where('letter_id', '=', $violationLetter->id)->get();
        return view('pages.violations.detail', [
            'page' => 'Detail Surat Pelanggaran',
            'violation_letter' => $violationLetter,
            'violations' => $violations,
            'attachment_letters' => $attachment_letters,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViolationLetter  $violationLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViolationLetter $violationLetter)
    {
        $validatedData = $request->validate([
            'regarding' => 'required',
            'offender' => 'required',
            'activity' => 'required',
            'street' => 'required',
            'village' => 'required',
            'districts' => 'required',
        ]);
        ViolationLetter::where('id', $violationLetter->id)
            ->update($validatedData);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    public function add_violation(Request $request, ViolationLetter $violationLetter)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $validatedData['letter_id'] = $violationLetter->id;
        
        Violation::create($validatedData);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    public function add_signature(Request $request, ViolationLetter $violationLetter)
    {
        $folderPath = storage_path('app/public/images/signatures/');
        $image_parts = \explode(';base64', $request->signed);
        $image_type_aux = \explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $name = strtolower($violationLetter->offender) . uniqid() . '.' . $image_type;
        $file = $folderPath . $name;

        \file_put_contents($file, $image_base64);
        ViolationLetter::where('id', $violationLetter->id)->update([
            'signature' => 'images/signatures/' . $name
        ]);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
// 
        // return back()->with('success', 'Tanda Tangan Berhasil ditambahkan');
    }

    public function delete_violation(ViolationLetter $violationLetter, Violation $violation)
    {
        Violation::destroy($violation->id);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    public function add_attachment(Request $request, ViolationLetter $violationLetter)
    {
        $validatedData = $request->validate([
            'attachment' => 'image|file',
        ]);
        $validatedData['letter_id'] = $violationLetter->id;

        if( $request->file('attachment') ){
            $validatedData['attachment'] = $request->file('attachment')->store('images/violations');
            AttachmentLetter::create($validatedData);
        }
        
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    public function delete_attachment(ViolationLetter $violationLetter, AttachmentLetter $attachmentLetter)
    {
        AttachmentLetter::destroy($attachmentLetter->id);
        return redirect('/admin/violations/' . $violationLetter->id . '/edit')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViolationLetter  $violationLetter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViolationLetter $violationLetter)
    {
        //
    }

    public function export(ViolationLetter $violationLetter) {
        $signature = Config::where('shortcode', 'TTD-KBD-PR')->first();
        $violations = Violation::where('letter_id', '=', $violationLetter->id)->get();
        $attachment_letters = AttachmentLetter::where('letter_id', '=', $violationLetter->id)->get();

        $pages = array();
        $pages[] = View::make('exports.page1', [
            'signature'         => $signature,
            'violation_letter' => $violationLetter,
            'violations' => $violations,
            ]);
            $pages[] = View::make('exports.page2', [
                'violation_letter' => $violationLetter,
                'attachment_letters' => $attachment_letters,
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
