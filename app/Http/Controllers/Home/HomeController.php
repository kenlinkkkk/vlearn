<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Page;
use App\Repositories\Admin\PackageEloquentRepository;
use App\Repositories\Admin\PageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct(PageEloquentRepository $pageEloquentRepository, PackageEloquentRepository $packageEloquentRepository)
    {
        $this->pageEloquentRepository = $pageEloquentRepository;
        $this->packageEloquentRepository = $packageEloquentRepository;
    }

    public function index()
    {
        $pages = Page::where('status', '=', 1)->get();
        $packages = Package::where('status', '=', 1)->with('package')->get();

        $data = compact(
            'pages',
            'packages'
        );

        return view('welcome', $data);
    }

    public function regSubmit(Request $request)
    {
        $data = $request->except('_token');
        $url = 'http://mskill.vn/dangky/api/register.jsp?serviceId=30&sub='. $data['package'];

        return Redirect::away($url);
    }

    public function backUrl(Request $request)
    {

    }
}
