<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoticeboardPostRequest;
use App\Http\Requests\UpdateNoticeboardPostRequest;
use App\Models\NoticeboardPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminNoticeboardController extends Controller
{
    /**
     * Show admin Noticeboard - all posts
     *
     * @return View
     */
    public function index(): View
    {
        $noticeboardPosts = NoticeboardPost::latest()->paginate(10);
        return view('admin.noticeboard.index', compact('noticeboardPosts'));
    }

     /**
     * create Noticeboard Post page
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.noticeboard.create');
    }

    /**
     * show specific Noticeboard Post
     *
     * @param  mixed $noticeboardPost
     * @return View
     */
    public function show(NoticeboardPost $noticeboardPost): View
    {
        return view('admin.noticeboard.show', compact('noticeboardPost'));
    }

    /**
     * validate and store new Noticeboard Post
     *
     * @return void
     */
    public function store(StoreNoticeboardPostRequest $request)
    {

        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['building_id'] = Auth::user()->building_id;

        NoticeboardPost::create($attributes);

        return redirect(route('admin.noticeboard'))->with('success', 'Your post has been published.');
    }

    /**
     * edit page for individual posts
     *
     * @param  mixed $noticeboardPost
     * @return void
     */
    public function edit(NoticeboardPost $noticeboardPost)
    {
        return view('admin.noticeboard.edit', ['noticeboardPost' => $noticeboardPost]);
    }

    /**
     * validate changes and update Noticeboard Posts
     *
     * @param  mixed $noticeboardPost
     * @return void
     */
    public function update(UpdateNoticeboardPostRequest $request, NoticeboardPost $noticeboardPost)
    {
        $attributes = $request->validated();
        $noticeboardPost->update($attributes);

        $noticeboardPost->update($attributes);

        return redirect(route('admin.noticeboard'))->with('success', 'Post Updated!');
    }

    /**
     * delete Noticeboard Posts
     *
     * @param  mixed $noticeboardPost
     * @return void
     */
    public function destroy(NoticeboardPost $noticeboardPost)
    {
        $noticeboardPost->delete();

        return redirect(route('admin.noticeboard'))->with('success', 'Post Deleted!');
    }
}
