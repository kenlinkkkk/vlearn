<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Package;
use App\Repositories\Admin\LessonEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LessonController extends Controller
{
    const IMAGE_THUMBNAIL = ['w' => 480, 'h' => 270];
    public function __construct(LessonEloquentRepository $lessonEloquentRepository)
    {
        $this->lessonEloquentRepository = $lessonEloquentRepository;
    }

    public function index(Request $request)
    {
        if (!empty($request->get('q'))) {
            $query = '%'.url_slug($request->get('q')).'%';
            $lessons = Lesson::query()->where('status', '=', 1)->where('slug', 'like', $query)->with('withPackage')->paginate(10);
            foreach ($lessons as $lesson) {
                $pathVideo = str_replace('\\', '/', public_path('uploads/lessons/'. $lesson->video));
                if (File::exists($pathVideo)) {
                    $lesson->fileSize = number_format(File::size($pathVideo) / 1024 / 1024, 2, '.', ',');
                } else {
                    $lesson->fileSize = 0;
                }
            }
        } else {
            $lessons = Lesson::query()->where('status', '=', 1)->with('withPackage')->paginate(10);
            foreach ($lessons as $lesson) {
                $pathVideo = str_replace('\\', '/', public_path('uploads/lessons/'. $lesson->video));
                if (File::exists($pathVideo)) {
                    $lesson->fileSize = number_format(File::size($pathVideo) / 1024 / 1024, 2, '.', ',');
                } else {
                    $lesson->fileSize = 0;
                }
            }
        }
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
        $item = Lesson::query()->whereKey($lesson_id)->first();
        $courses = Package::query()
            ->where('fa_package', '<>', 0)
            ->where('status', '=', 1)
            ->get();
        $data = compact('item', 'courses');
        return view('admin.lesson.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['slug'])) {
            $data['slug'] = url_slug($data['name'], ['timestamps' => true, 'limit' => 100]);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueName = url_slug($file->getClientOriginalName(), ['timestamps' => true, 'delimiter' => '_', 'limit' => 100]) .'.'. $file->getClientOriginalExtension();
            $input['image_thumbnail'] = 'thumbnail64_'. $uniqueName;
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $img1 = Image::make($file->path());
            $img1->fit(self::IMAGE_THUMBNAIL['w'], self::IMAGE_THUMBNAIL['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail'], 72);

            $picture_name = $uniqueName;
            $file->move($filePath, $picture_name);
            $data['image'] = $picture_name;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $video_name = url_slug($file->getClientOriginalName(), ['delimiter' => '_', 'limit' => 100]) .'.'. $file->getClientOriginalExtension();
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

    public function update(Request $request, $lesson_id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $uniqueName = url_slug($file->getClientOriginalName(), ['timestamps' => true, 'delimiter' => '_', 'limit' => 100]) .'.'. $file->getClientOriginalExtension();
            $input['image_thumbnail'] = 'thumbnail64_'. $uniqueName;
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $img1 = Image::make($file->path());
            $img1->fit(self::IMAGE_THUMBNAIL['w'], self::IMAGE_THUMBNAIL['h'], function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($filePath .'/'.$input['image_thumbnail'], 72);

            $picture_name = $uniqueName;
            $file->move($filePath, $picture_name);
            $data['image'] = $picture_name;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filePath = 'uploads/lessons';
            $filePath = str_replace('\\', '/', $filePath);
            $video_name = url_slug($file->getClientOriginalName(), ['timestamps' => true, 'delimiter' => '_', 'limit' => 100]) .'.'. $file->getClientOriginalExtension();
            $file->move($filePath, $video_name);
            $data['video'] = $video_name;
        }

        try {
            $result = $this->lessonEloquentRepository->update($lesson_id, $data);
            if ($result) {
                session()->flash('success', 'Cập nhật thành công');
            } else {
                session()->flash('error', 'Cập nhật thất bại');
            }
            return Redirect::route('admin.lesson.index');
        } catch (\Exception $exception) {
            return report($exception);
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $lesson = Lesson::query()->whereKey($id)->first();
            $pathVideo = str_replace('\\', '/', public_path('uploads/lessons/'. $lesson->video));
            $pathImg = str_replace('\\','/',public_path('uploads/lessons/'. $lesson->image));
            $pathImgThumb = str_replace('\\','/',public_path('uploads/lessons/thumbnail64_'. $lesson->image));

            $result = $lesson->forceDelete();
            if ($result) {
                $deleteVideoResult = File::delete($pathVideo);
                $deleteImgResult = File::delete($pathImg);
                $deleteImgThumbResult = File::delete($pathImgThumb);
                if ($deleteVideoResult && $deleteImgResult && $deleteImgThumbResult) {
                    DB::commit();
                    session()->flash('success', 'Xóa thành công');
                } else {
                    DB::rollBack();
                    session()->flash('error', 'Lỗi xóa file');
                }
            } else {
                DB::rollBack();
                session()->flash('error', 'Cập nhật thất bại');
            }
            return Redirect::back();
        } catch (Exception $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
            return report($exception);
        }
    }
}
