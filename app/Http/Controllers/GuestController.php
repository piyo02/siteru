<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Config;
use App\Models\Policy;
use App\Models\Sector;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Infrastructure;
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
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        $sectors = Sector::all();

        $videos = Config::where('shortcode', 'VD')->get();
        $faqs = Config::where('shortcode', 'FAQ')->get();

        return view('guest.v3.index', [
            'galleries' => $galleries,
            'newses' => $newses,
            'videos' => $videos,
            'faqs' => $faqs,
            'sectors' => $sectors,
            'slides' => $slides,
            'fav_news' => $fav_news,
            'configs' => $configs,
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
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('guest.v3.profile', [
            'sectors' => $sectors,
            'vs_ms_content' => $vs_ms_content,
            'tgs_fgs_content' => $tgs_fgs_content,
            'mt_lbg_content' => $mt_lbg_content,
            'str_org' => $str_org,
            'configs' => $configs,
        ]);
    }

    public function infrastructure($slug)
    {
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        
        $config = Config::where('field', $slug)->first();
        $infrastructures = Infrastructure::where('config_id', $config->id)->get();
        
        return view('guest.v3.infrastructure', [
            'infrastructures' => $infrastructures,
            'sectors' => $sectors,
            'configs' => $configs,
        ]);
    }

    public function sector($slug)
    {
        $sectors = Sector::all();
        $sector = Sector::where('slug', $slug)->first();
        $contacts = $sector->sector_contacts()->get();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();

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
            'configs' => $configs,
        ]);
    }

    public function news()
    {
        $newses = News::paginate(9);
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('guest.v3.news', [
            'newses' => $newses,
            'sectors' => $sectors,
            'configs' => $configs,
        ]);
    }
    
    public function show_news($slug)
    {
        $news = News::where('slug', $slug)->first();
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        try {
            $news_content = Storage::disk('local')->get($news->file);
        } catch (\Exception $exception) {
            $news_content = Storage::disk('local')->get('public/uploads/news/news.html');
        }
        return view('guest.v3.detail-news', [
            'news' => $news,
            'news_content' => $news_content,
            'sectors' => $sectors,
            'configs' => $configs,
        ]);
        // dd($slug);
    }

    public function galleries()
    {
        $galleries = Gallery::take(9)->paginate();
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('guest.v3.galleries', [
            'sectors' => $sectors,
            'galleries' => $galleries,
            'configs' => $configs,
        ]);
    }

    public function show_gallery($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        try {
            $gallery_content = Storage::disk('local')->get($gallery->file);
        } catch (\Exception $exception) {
            $gallery_content = Storage::disk('local')->get('public/uploads/galleries/galleries.html');
        }
        return view('guest.v3.detail-gallery', [
            'gallery' => $gallery,
            'gallery_content' => $gallery_content,
            'sectors' => $sectors,
            'configs' => $configs,
        ]);
    }
    
    public function policies()
    {
        $policies = Policy::all();
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('guest.v3.policies', [
            'sectors' => $sectors,
            'policies' => $policies,
            'configs' => $configs,
        ]);
    }

    public function maps()
    {
        $sectors = Sector::all();
        $configs = Config::where('shortcode', 'like', 'TP-INF')->get();
        return view('guest.v3.maps', [
            'sectors' => $sectors,
            'configs' => $configs,
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
