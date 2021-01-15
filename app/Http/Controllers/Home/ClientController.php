<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use App\Models\Lesson;
use App\Models\Package;
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

    public function viewListCourses()
    {
        $pages = Page::where('status', '=', 1)->get();

        $pkg = session()->get('_user')['packages'];
        if (in_array('MT', $pkg)) {
            $packages = Package::query()->where('status', '=', 1)
                ->get();
        } else {
            $packages = Package::query()->where('status', '=', 1)
                ->whereIn('package_code', $pkg)
                ->get();
        }
        $pkg_ids = [];
        foreach ($packages as $package) {
            $pkg_ids[] = $package->id;
        }

        $subPackages = Package::query()->where('status', '=', 1)
            ->whereIn('fa_package', $pkg_ids)
            ->with('withLessons')
            ->with('package')
            ->paginate(10);
        $data = compact('pages', 'subPackages');
        return view('client.courses', $data);
    }

    public function viewListLessons(Request $request, $slug)
    {
        $params = $request->get('c');

        $course = Package::query()->where('slug', '=', $slug)->first();
        $lessons = Lesson::query()->where('package_id', '=', $course->id)
            ->where('status', '=', 1)
            ->paginate(12);
        $data = compact('course', 'lessons');
        return view('client.listLessons', $data);
    }

    public function detailLesson(Request $request, $slug)
    {
        $lesson = Lesson::query()->where('slug', '=', $slug)->first();
        $lessonsSameCourse = Lesson::query()->where('package_id', '=', $lesson->package_id)
            ->where('status', '=', 1)
            ->get();

//        usort($lessonsSameCourse, function ($a, $b) {
//            $a1 = preg_split('/-/i', $a['name']);
//            $b1 = preg_split('/-/i', $b['name']);
//            $aNumber = preg_replace('/[^0-9]/', '', url_slug($a1[0]));
//            $bNumber = preg_replace('/[^0-9]/', '', url_slug($b1[0]));
//            return $aNumber < $bNumber ? -1 : 1;
//        });
//        ActionLog::query()->create([
//            'msisdn' => session()->get('_user')['msisdn'],
//            'action' => 'VIEW_LESSON',
//            'lesson_id' => $lesson->id,
//            'note' => 'Xem bài học'
//        ]);
//        Lesson::query()->whereKey($lesson->id)
//            ->update([
//                'view_count' => $lesson->view_count + 1,
//            ]);
        $data = compact('lesson', 'lessonsSameCourse');

        return view('client.detailLesson', $data);
    }

    public function viewProfile()
    {
        $pkg = session()->get('_user')['packages'];

        $packages = Package::query()->whereIn('package_code', $pkg)
            ->where('status', '=', 1)
            ->get();

        $data = compact('packages');
        return view('client.profile', $data);
    }

    public function clientLogout(Request $request)
    {
        $request->session()->forget('_user');
        $request->session()->flush();

        return Redirect::route('home.index');
    }

    public function createLogView(Request $request)
    {

    }
}
