<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Policy;
use App\Models\Sector;
use App\Models\User;
use App\Models\Violation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $role = auth()->user()->role->name;
        $sector_id = auth()->user()->sector_id;
        if( $role == 'User Sector' ){
            $news = News::where('sector_id', $sector_id)->with('sector')->latest()->first();
            $galleries = Gallery::where('sector_id', $sector_id)->with('sector')->latest()->take(3)->get();
        } else {
            $news = News::with('sector')->latest()->first();
            $galleries = Gallery::with('sector')->latest()->take(3)->get();
        }
        return view('pages.dashboard.index', [
            'info' => [
                'bidang'    => Sector::count(),
                'berita'    => News::count(),
                'galeri'    => Gallery::count(),
                'kebijakan' => Policy::count(),
                'user'      => User::count(),    
                'pelanggaran'=> Violation::count(),    
            ],
            'news' => $news,
            'galleries' => $galleries,
        ]);
    }
}
