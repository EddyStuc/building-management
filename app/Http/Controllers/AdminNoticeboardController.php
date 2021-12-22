<?php

namespace App\Http\Controllers;

use App\Models\NoticeboardPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminNoticeboardController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $noticeboardPosts = NoticeboardPost::all();
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
     * show
     *
     * @param  string $noticeboardPost
     * @return View
     */
    public function show(NoticeboardPost $noticeboardPost): View
    {
        return view('admin.noticeboard.show', compact('noticeboardPost'));
    }

    public function store()
    {
       $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('noticeboard_posts', 'slug')],
            'subject' => 'required',
            'body' => 'required',
        ]);

        $attributes['user_id'] = Auth::user()->id;
        $attributes['building_id'] = Auth::user()->building_id;

        NoticeboardPost::create($attributes);

        return redirect(route('admin.noticeboard'))->with('success', 'Your post has been published.');
    }
}
