<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Repositories\Admin\PackageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use TheSeer\Tokenizer\Exception;

class PackageController extends Controller
{
    public function __construct(PackageEloquentRepository $packageEloquentRepository)
    {
        $this->packageEloquentRepository = $packageEloquentRepository;
    }

    public function index()
    {
        $packages = $this->packageEloquentRepository->edge('package');

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

        $data = compact(
            'package'
        );

        return view('admin.package.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = url_slug($data['name']);

        try {
            $result = $this->packageEloquentRepository->create($data);
        } catch (Exception $exception) {
            report($exception);
        }

        if ($result) {
            session()->flash('success', 'Thêm mới thành công');
            return Redirect::route('admin.page.index');
        } else {
            session()->flash('error', 'Thêm mới thất bại');
            return Redirect::back();
        }
    }

    public function update(Request $request, $package_id)
    {
        $data = $request->except('_token');

        try {
            $result = $this->pageEloquentRepository->update($package_id, $data);
        } catch (\Exception $exception) {
            report($exception);
        }

        if ($result) {
            session()->flash('success', 'Cập nhật thành công');
            return Redirect::route('admin.page.index');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
            return Redirect::back();
        }
    }
}
