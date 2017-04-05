<?php

namespace App\Http\Controllers\Api\V1;

use App\ContentPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentPagesRequest;
use App\Http\Requests\UpdateContentPagesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class ContentPagesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return ContentPage::all();
    }

    public function show($id)
    {
        return ContentPage::findOrFail($id);
    }

    public function update(UpdateContentPagesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $content_page = ContentPage::findOrFail($id);
        $content_page->update($request->all());

        return $content_page;
    }

    public function store(StoreContentPagesRequest $request)
    {
        $request = $this->saveFiles($request);
        $content_page = ContentPage::create($request->all());

        return $content_page;
    }

    public function destroy($id)
    {
        $content_page = ContentPage::findOrFail($id);
        $content_page->delete();
        return '';
    }
}
