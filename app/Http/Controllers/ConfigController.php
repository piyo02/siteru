<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Config::where('shortcode', 'NM-KBD-PR')->first();
        $employee_number = Config::where('shortcode', 'NIP-KBD-PR')->first();
        $signature = Config::where('shortcode', 'TTD-KBD-PR')->first();

        $vs_ms = Config::where('shortcode', 'VS-MS')->first();
        $tgs_fgs = Config::where('shortcode', 'TGS-FGS')->first();
        $mt_lbg = Config::where('shortcode', 'MT-LBG')->first();
        $str_org = Config::where('shortcode', 'STR-ORG')->first();

        $slides = Config::where('shortcode', 'like', 'SLD%')->get();
        $videos = Config::where('shortcode', 'like', 'VD')->get();
        $faqs = Config::where('shortcode', 'like', 'FAQ')->get();
        return view('pages.configs.index', [
            'page'              => 'Master Configuration',
            'name'              => $name,
            'employee_number'   => $employee_number,
            'signature'         => $signature,
            'vs_ms'             => $vs_ms,
            'vs_ms_content'     => file_get_contents(\storage_path('app/'.$vs_ms->value)),
            'tgs_fgs'           => $tgs_fgs,
            'tgs_fgs_content'   => file_get_contents(\storage_path('app/'.$tgs_fgs->value)),
            'mt_lbg'            => $mt_lbg,
            'mt_lbg_content'    => file_get_contents(\storage_path('app/'.$mt_lbg->value)),
            'str_org'           => $str_org,
            'slides'            => $slides,
            'videos'            => $videos,
            'faqs'            => $faqs,
        ]); 
    }

    public function store(Request $request)
    {
        $path = '/admin/master/configs';
        $type = $request->type;
        if( $type == 'faq' ){
            $validatedData['shortcode'] = 'FAQ';
            $validatedData['value'] = $request->value;
            $validatedData['field'] = $request->field;
        } else if( $type == 'type' ){
            $validatedData['shortcode'] = 'TP-INF';
            $validatedData['value'] = $request->value;
            $validatedData['field'] = \strtolower($request->value);
            $path = '/admin/infrastructure/type';
    }

        if( isset( $validatedData ) && $validatedData != NULL ){
            Config::create($validatedData);
            $status = 'success';
            $message = 'Berhasil';
        } else {
            $status = 'error';
            $message = 'Gagal';
        }

        
        return redirect($path)->with($status, $message);
    }

    public function update(Request $request, Config $config)
    {
        $path = '/admin/master/configs';
        $type = $request->type;
        if( $type == 'editor' ){
            if( Storage::disk('local')->put( $config->value, $request->value ) ){
                $validatedData['value'] = $config->value;
            }
        } else if( $type == 'image' ){
            if( $request->file('value') ){
                $validatedData['value'] = $request->file('value')->store( 'images/configs/' );
            }
        } else if( $type == 'default' ){
            $validatedData['value'] = $request->value;
        } else if( $type == 'video' ){
            $validatedData['value'] = $request->value;
            $validatedData['field'] = $request->field;
        } else if( $type == 'faq' ){
            $validatedData['value'] = $request->value;
            $validatedData['field'] = $request->field;
        } else if( $type == 'type' ){
            $path = '/admin/infrastructure/type';
            $validatedData['value'] = $request->value;
            // $validatedData['field'] = $request->field;
        }
        

        if( isset( $validatedData ) && $validatedData != NULL ){
            Config::where('id', $config->id)
                ->update($validatedData);
            $status = 'success';
            $message = 'Berhasil';
        } else {
            $status = 'error';
            $message = 'Gagal';
        }

        
        return redirect($path)->with($status, $message);
    }

    public function destroy(Config $config)
    {
        Config::destroy($config->id);
        $path = ($config->shortcode == 'TP-INF') ? '/admin/infrastructure/type' : '/admin/master/configs/';
        return redirect($path)->with('success', 'Berhasil');
    }

    public function infrastructure_type()
    {
        $types = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('pages.infrastructures.type', [
            'page'  => 'Tipe Infrastuktur',
            'types' => $types,
        ]);
    }
}
