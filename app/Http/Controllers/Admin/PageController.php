<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\PackageEloquentRepository;
use App\Repositories\Admin\PageEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function __construct(PageEloquentRepository $pageEloquentRepository)
    {
        $this->pageEloquentRepository = $pageEloquentRepository;
    }

    public function index()
    {
        $pages = $this->pageEloquentRepository->getAll();

        $data = compact(
            'pages'
        );

        return view('admin.page.index', $data);
    }

    public function add()
    {
        return view('admin.page.add');
    }

    public function edit($page_id)
    {
        $page = $this->pageEloquentRepository->find($page_id);

        $data = compact(
            'page'
        );

        return view('admin.page.edit', $data);
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        $data['slug'] = url_slug($data['title']);

        try {
            $result = $this->pageEloquentRepository->create($data);
        } catch (\Exception $exception) {
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

    public function update(Request $request, $page_id)
    {
        $data = $request->except('_token');

        try {
            $result = $this->pageEloquentRepository->update($page_id, $data);
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

    public function upload()
    {

    }
}
