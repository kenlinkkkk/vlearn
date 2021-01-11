<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Package;
use App\Repositories\Admin\LessonEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class LessonController extends Controller
{
    const IMAGE_THUMBNAIL = ['w' => 320, 'h' => 180];
    public function __construct(LessonEloquentRepository $lessonEloquentRepository)
    {
        $this->lessonEloquentRepository = $lessonEloquentRepository;
    }

    public function index()
    {
        $lessons = Lesson::query()->where('status', '=', 1)->get();
        $data = compact('lessons');
        return view('admin.lesson.index', $data);
    }

    public function add()
    {
        $courses = Package::query()
            ->where('fa_package', '<>', 0)
            ->where('status', '=', 1)
            ->get();
        $data = compact('courses');
        return view('admin.lesson.add', $data);
    }

    public function edit($lesson_id)
    {
        $item = Lesson::query()->where('slug', '=', $lesson_id)->where('status', '=', 1)->first();

        $data = compact('item');
        return view('admin.lesson.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['slug'])) {
            $data['slug'] = url_slug($data['title'], ['timestamps' => true]);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $input['image_thumbnail'] = 'thumbnail64_'. $file->getClientOriginalName();
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $img1 = Image::make($file->path());
            $img1->fit(self::IMAGE_THUMBNAIL['w'], self::IMAGE_THUMBNAIL['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail'], 72);

            $picture_name = $file->getClientOriginalName();
            $file->move($filePath, $picture_name);
            $data['image'] = $picture_name;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $video_name = $file->getClientOriginalName();
            $file->move($filePath, $video_name);
            $data['video'] = $video_name;
        }

        try {
            $result = $this->lessonEloquentRepository->create($data);
            if ($result) {
                session()->flash('success', 'Thêm mới thành công');
            } else {
                session()->flash('error', 'Thêm mới thất bại');
            }
            return Redirect::route('admin.lesson.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function update(Request $request)
    {

    }
}
