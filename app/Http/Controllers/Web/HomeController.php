<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Specialisation;
use App\Models\Detail;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function index2()
    {
        $presetations = Presentation::first();
        $specialisations = Specialisation::get();
        $details = Detail::select('details.*')->where('category_id', 1)->where('status', 1)->paginate(8);
        $records = Category::select('categories.*')->where('id', '>=', 2)->get();
        return view('presentation.home.index', compact('records', 'presetations', 'specialisations', 'details'));
    }

    public function digitalmarketing($slug, $id)
    {
        $url=url()->current();
		$urlname = explode("/",$url);
        $cname =$urlname[5];
        $a = explode("-", $cname);  
        $preseturl =join(" ",$a);
        

        $presetations = Presentation::first();
        $details = Detail::select('details.*')->where('category_id', $id)->where('status', 1)->paginate(8);
        
        $records = Category::select('categories.*')->where('id', '>=', 2)->get();
        return view('presentation.home.digital', compact('records', 'details', 'presetations', 'preseturl'));
    }


}
