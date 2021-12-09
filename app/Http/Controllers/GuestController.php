<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Config;
use App\Models\Policy;
use App\Models\Sector;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class GuestController extends Controller
{
    public function index()
    {
        $slides = Config::where('shortcode', 'like', 'SLD%')->get();
        $newses = News::latest()->take(3)->get();
        $fav_news = News::orderBy('seen', 'desc')->first();
        $galleries = Gallery::latest()->take(6)->get();
        $sectors = Sector::all();

        $videos = Config::where('shortcode', 'VD')->get();

        return view('guest.v3.index', [
            'galleries' => $galleries,
            'newses' => $newses,
            'videos' => $videos,
            'sectors' => $sectors,
            'slides' => $slides,
            'fav_news' => $fav_news,
        ]);
    }
    
    public function profile()
    {
        $vs_ms = Config::where('shortcode', 'VS-MS')->first();
        $vs_ms_content = Storage::disk('local')->get($vs_ms->value);
        
        $tgs_fgs = Config::where('shortcode', 'TGS-FGS')->first();
        $tgs_fgs_content = Storage::disk('local')->get($tgs_fgs->value);
        
        $mt_lbg = Config::where('shortcode', 'MT-LBG')->first();
        $mt_lbg_content = Storage::disk('local')->get($mt_lbg->value);
        
        $str_org = Config::where('shortcode', 'STR-ORG')->first();
        
        $sectors = Sector::all();
        return view('guest.v3.profile', [
            'sectors' => $sectors,
            'vs_ms_content' => $vs_ms_content,
            'tgs_fgs_content' => $tgs_fgs_content,
            'mt_lbg_content' => $mt_lbg_content,
            'str_org' => $str_org,
        ]);
    }

    public function infrasctructure()
    {
        $sectors = Sector::all();
        return view('guest.v3.infrastructure', [
            'sectors' => $sectors,
        ]);
    }

    public function sector($slug)
    {
        $sectors = Sector::all();
        $sector = Sector::where('slug', $slug)->first();
        $contacts = $sector->sector_contacts()->get();

        try {
            $program    = Storage::disk('local')->get($sector->program);
            $job        = Storage::disk('local')->get($sector->job);
            $purpose    = Storage::disk('local')->get($sector->purpose);
        } catch (\Exception $exception) {
            $program    = Storage::disk('local')->get('public/uploads/programs/program.html');
            $job        = Storage::disk('local')->get('public/uploads/jobs/job.html');
            $purpose    = Storage::disk('local')->get('public/uploads/purposes/purpose.html');
        }
        return view('guest.v3.sector', [
            'contacts' => $contacts,
            'sectors' => $sectors,
            'sector' => $sector,
            'program'   => $program,
            'job'       => $job,
            'purpose'   => $purpose,
        ]);
    }

    public function news()
    {
        $newses = News::paginate(9);
        $sectors = Sector::all();
        return view('guest.v3.news', [
            'newses' => $newses,
            'sectors' => $sectors,
        ]);
    }
    
    public function show_news($slug)
    {
        $news = News::where('slug', $slug)->first();
        $sectors = Sector::all();
        try {
            $news_content = Storage::disk('local')->get($news->file);
        } catch (\Exception $exception) {
            $news_content = Storage::disk('local')->get('public/uploads/news/news.html');
        }
        return view('guest.v3.detail-news', [
            'news' => $news,
            'news_content' => $news_content,
            'sectors' => $sectors,
        ]);
        // dd($slug);
    }

    public function galleries()
    {
        $galleries = Gallery::take(9)->paginate();
        $sectors = Sector::all();
        return view('guest.v3.galleries', [
            'sectors' => $sectors,
            'galleries' => $galleries,
        ]);
    }

    public function show_gallery($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();
        $sectors = Sector::all();
        try {
            $gallery_content = Storage::disk('local')->get($gallery->file);
        } catch (\Exception $exception) {
            $gallery_content = Storage::disk('local')->get('public/uploads/galleries/galleries.html');
        }
        return view('guest.v3.detail-gallery', [
            'gallery' => $gallery,
            'gallery_content' => $gallery_content,
            'sectors' => $sectors,
        ]);
    }
    
    public function policies()
    {
        $policies = Policy::all();
        $sectors = Sector::all();
        return view('guest.v3.policies', [
            'sectors' => $sectors,
            'policies' => $policies,
        ]);
    }

    public function maps()
    {
        $sectors = Sector::all();
        return view('guest.v3.maps', [
            'sectors' => $sectors
        ]);
    }

    public function download(Policy $policy)
    {
        return Response::make( \file_get_contents( \storage_path( 'app/public/' . $policy->file ) ), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Kebijakan.pdf"'
        ] );
    }
}
