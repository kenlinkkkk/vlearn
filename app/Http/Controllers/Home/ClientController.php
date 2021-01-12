<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Page;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    const GUZZLE_HEADERS = ['Content-Type' => 'application/x-www-form-urlencoded'];
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'headers' => self::GUZZLE_HEADERS,
        ]);
    }

    public function localLogin(Request $request)
    {
        $data = $request->except('_token');

        $body = [
            'msisdn' => substr($data['msisdn'], -9)
        ];

        $resp = $this->client->request('POST', 'http://api.edusite.vn/v1/api/checkSubs', [
            'form_params' => $body
        ]);

        $response = json_decode($resp->getBody()->getContents());

        $pkg = [];
        if ($response->code == 1) {
            foreach ($response->data as $item) {
                if ($item->status == 1) {
                    array_push($pkg, $item->packageCode);
                }
            }
        }

        session()->put('_user', [
            'msisdn' => '0'. substr($data['msisdn'], -9),
            'packages' => $pkg
        ]);
        return Redirect::route('home.course.listCourse');
    }

    public function viewListCourse()
    {
        $pages = Page::where('status', '=', 1)->get();

        $pkg = session()->get('_user')['packages'];
        $data = compact('pages');
        return view('client.courses', $data);
    }

    public function viewLesson()
    {

    }
}
