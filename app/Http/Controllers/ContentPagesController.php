<?php

namespace App\Http\Controllers;

use App\ContentPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreContentPagesRequest;
use App\Http\Requests\UpdateContentPagesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\Datatables\Datatables;

class ContentPagesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of ContentPage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('content_page_access')) {
            return abort(401);
        }
        $content_pages = ContentPage::all();

        return view('content_pages.index', compact('content_pages'));
    }

    /**
     * Show the form for creating new ContentPage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('content_page_create')) {
            return abort(401);
        }
        $relations = [
            'category_ids' => \App\ContentCategory::get()->pluck('title', 'id'),
            'tag_ids' => \App\ContentTag::get()->pluck('title', 'id'),
        ];

        return view('content_pages.create', $relations);
    }

    /**
     * Store a newly created ContentPage in storage.
     *
     * @param  \App\Http\Requests\StoreContentPagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentPagesRequest $request)
    {
        if (! Gate::allows('content_page_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $content_page = ContentPage::create($request->all());
        $content_page->category_id()->sync(array_filter((array)$request->input('category_id')));
        $content_page->tag_id()->sync(array_filter((array)$request->input('tag_id')));

        return redirect()->route('content_pages.index');
    }


    /**
     * Show the form for editing ContentPage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('content_page_edit')) {
            return abort(401);
        }
        $relations = [
            'category_ids' => \App\ContentCategory::get()->pluck('title', 'id'),
            'tag_ids' => \App\ContentTag::get()->pluck('title', 'id'),
        ];

        $content_page = ContentPage::findOrFail($id);

        return view('content_pages.edit', compact('content_page') + $relations);
    }

    /**
     * Update ContentPage in storage.
     *
     * @param  \App\Http\Requests\UpdateContentPagesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentPagesRequest $request, $id)
    {
        if (! Gate::allows('content_page_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $content_page = ContentPage::findOrFail($id);
        $content_page->update($request->all());
        $content_page->category_id()->sync(array_filter((array)$request->input('category_id')));
        $content_page->tag_id()->sync(array_filter((array)$request->input('tag_id')));

        return redirect()->route('content_pages.index');
    }


    /**
     * Display ContentPage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('content_page_view')) {
            return abort(401);
        }
        $relations = [
            'category_ids' => \App\ContentCategory::get()->pluck('title', 'id'),
            'tag_ids' => \App\ContentTag::get()->pluck('title', 'id'),
        ];

        $content_page = ContentPage::findOrFail($id);

        return view('content_pages.show', compact('content_page') + $relations);
    }


    /**
     * Remove ContentPage from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('content_page_delete')) {
            return abort(401);
        }
        $content_page = ContentPage::findOrFail($id);
        $content_page->delete();

        return redirect()->route('content_pages.index');
    }

    /**
     * Delete all selected ContentPage at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('content_page_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ContentPage::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}