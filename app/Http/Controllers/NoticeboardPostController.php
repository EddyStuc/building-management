<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticeboardPostRequest;
use App\Http\Requests\UpdateNoticeboardPostRequest;
use App\Models\NoticeboardPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class NoticeboardPostController extends Controller
{
    /**
     * Show main Noticeboard
     *
     * @return View
     */
    public function index(): View
    {
        $noticeboardPosts = (new NoticeboardPost())->showAllIfAdmin();
        return view('noticeboard.index', compact('noticeboardPosts'));
    }

    /**
     * create Noticeboard Post page
     *
     * @return View
     */
    public function create(): View
    {
        return view('noticeboard.create');
    }

    /**
     * show Noticeboard Post page
     *
     * @param  mixed $noticeboardPost
     * @return View
     */
    public function show(NoticeboardPost $noticeboardPost): View
    {
        return view('noticeboard.show', compact('noticeboardPost'));
    }


    /**
     * validate and store new Noticeboard Post
     *
     * @return void
     */
    public function store(StoreNoticeboardPostRequest $request)
    {
        $attributes = $request->safe()->merge([
            'user_id' => Auth::user()->id,
            'building_id' => Auth::user()->building_id,
            'slug' => str($request['title'])->slug()
        ])->all();

        NoticeboardPost::create($attributes);

        return redirect(route('noticeboard'))->with('success', 'Your post has been published.');
    }

    /**
     * edit page for individual posts
     *
     * @param  mixed $noticeboardPost
     * @return void
     */
    public function edit(NoticeboardPost $noticeboardPost)
    {
        if (!Gate::allows('allowEdit', $noticeboardPost)) {
            abort(403);
        }
        return view('noticeboard.edit', ['noticeboardPost' => $noticeboardPost]);
    }

    /**
     * validate changes and update Noticeboard Posts
     *
     * @param  mixed $noticeboardPost
     * @return void
     */
    public function update(UpdateNoticeboardPostRequest $request, NoticeboardPost $noticeboardPost)
    {
        $attributes = $request->safe()->merge([
            'slug' => str($request['title'])->slug()
        ])->all();

        $noticeboardPost->update($attributes);

        return redirect(route('noticeboard'))->with('success', 'Post Updated!');
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

        return redirect(route('noticeboard'))->with('success', 'Post Deleted!');
    }
}
