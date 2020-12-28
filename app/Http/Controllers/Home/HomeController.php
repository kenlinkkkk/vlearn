<?php

namespace App\Http\Controllers\Home;

use AES_Encryption;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Page;
use App\Repositories\Admin\PackageEloquentRepository;
use App\Repositories\Admin\PageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $packages = Package::where('status', '=', 1)->where('fa_package', '=', 0)->with('packages')->get();
        foreach ($pages as $item) {
            $position = json_decode($item->position);
            $item->position = $position;
        }

//        if (session()->get('_user')['msisdn'] != 'empty') {
//            $response = $this->getPackageSubs(session()->get('_user')['msisdn']);
//            session()->put('_user', [
//                'msisdn' => session()->get('_user')['msisdn'],
//                'packages' => $response
//            ]);
//        }

        $data = compact(
            'pages',
            'packages'
        );
        return view('welcome', $data);
    }

    public function regSubmit(Request $request)
    {
        $data = $request->except('_token');
        $url = 'http://dangky.mobiedu.vn/api/register.jsp?sub='. $data['package'];

        return Redirect::away($url);
    }

    public function backUrl(Request $request)
    {
        $data = $request->get('param');
        if (!empty($data)){
            $data = str_replace(' ', '+', $data);
            $aes = new AES_Encryption(config('vlearn.encrypt.key'));
            $result = json_decode($aes->decrypt(base64_decode($data)));

            Log::info('MSISDN::Response-param::param='. $data);
            Log::info('MSISDN::Response-param::msisdn='. $result->result[0]->mobile);
            session()->put('_user', ['msisdn' => $result->result[0]->mobile]);
//          add package to session

//            $response = $this->getPackageSubs(session()->get('_user')['msisdn']);
//
//            session()->put('_user', [
//                'msisdn' => session()->get('_user')['msisdn'],
//                'packages' => $response
//            ]);

//          add log login to vlearn

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://api.edusite.vn/v1/api/logUse",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "msisdn=". "0". substr($result->result[0]->mobile, -9),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
            ));

            $response = json_decode(curl_exec($curl));

            curl_close($curl);

            return Redirect::route('home.index');
        } else {
            session()->put('_user', ['msisdn' => 'empty', 'packages' => 'empty']);
            return Redirect::route('home.index');
        }
    }

    public function showLogin()
    {
        $pages = Page::where('status', '=', 1)->get();
        $data = compact(
            'pages'
        );
        return view('client.login', $data);
    }

    public function postLogin(Request $request)
    {
        $data = $request->except('_token');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.edusite.vn/v1/api/logUse",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "msisdn=". "0". substr($data['phone'], -9),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        if ($response->code == 1) {
            session()->put('_user', ['msisdn' => '84'. substr($data['phone'], -9)]);
        }

//        $response = $this->getPackageSubs(session()->get('_user')['msisdn']);
//
//        session()->put('_user', [
//            'msisdn' => session()->get('_user')['msisdn'],
//            'packages' => $response
//        ]);


        return Redirect::route('home.index');
    }

    public function showPage(Request $request, $page_slug)
    {
        $pages = Page::where('status', '=', 1)->get();
        foreach ($pages as $item) {
            $position = json_decode($item->position);
            $item->position = $position;
        }
        $page = Page::where('slug', '=', $page_slug)->where('status', '=', 1)->first();
        $data = compact(
            'page',
            'pages'
        );

        return view('client.showpage', $data);
    }

    private function getPackageSubs($msisdn) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.edusite.vn/v1/api/checkSubs",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "msisdn=". "0". substr($msisdn, -9),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);
        $pkg = [];
        if ($response->code == 1) {
            foreach ($response->data as $item) {
                if ($item->status == 1) {
                    array_push($pkg, $item->packageCode);
                }
            }
        }
        return $pkg;
    }
}
