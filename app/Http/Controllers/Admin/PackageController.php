<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Repositories\Admin\PackageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class PackageController extends Controller
{
    public function __construct(PackageEloquentRepository $packageEloquentRepository)
    {
        $this->packageEloquentRepository = $packageEloquentRepository;
    }

    public function index()
    {
        $packages = Package::where('status', '=', 1)->with('package')->get();

        $data = compact(
            'packages'
        );

        return view('admin.package.index', $data);
    }

    public function add()
    {
        $packages = Package::where('fa_package', '=', 0)->where('status', '=', 1)->get();
        $data = compact(
            'packages'
        );
        return view('admin.package.add', $data);
    }

    public function edit($package_id)
    {
        $package = $this->packageEloquentRepository->find($package_id);
        $packages = Package::where('fa_package', '=', 0)->where('status', '=', 1)->get();
        $data = compact(
            'package',
            'packages'
        );
        return view('admin.package.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        if (empty($data['slug'])) {
            $data['slug'] = url_slug($data['name']);
        }

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $filePath = 'uploads/home';
            $filePath = str_replace('\\', '/', $filePath);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $filePath . '/' . $picture_name;
        }

        try {
            $result = $this->packageEloquentRepository->create($data);

            if ($result) {
                session()->flash('success', 'Thêm mới thành công');
            } else {
                session()->flash('error', 'Thêm mới thất bại');
            }
            return Redirect::route('admin.package.index');
        } catch (Throwable $exception) {
            return  report($exception);
        }
    }

    public function update(Request $request, $package_id)
    {
        $data = $request->except('_token');

        if ($request->hasFile('picture')) {
            $picture = $request->picture;
            $filePath = 'uploads/home';
            $filePath = str_replace('\\', '/', $filePath);

            $picture_name = $picture->getClientOriginalName();
            $picture->move($filePath, $picture_name);
            $data['picture'] = $filePath . '/' . $picture_name;
        }

        try {
            $result = $this->packageEloquentRepository->update($package_id, $data);

            if ($result) {
                session()->flash('success', 'Cập nhật thành công');
            } else {
                session()->flash('error', 'Cập nhật thất bại');
            }

            return Redirect::route('admin.package.index');
        } catch (Throwable $exception) {
           return report($exception);
        }
    }
}
