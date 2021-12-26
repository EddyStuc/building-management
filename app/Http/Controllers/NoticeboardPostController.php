<?php

namespace App\Http\Controllers;

use App\Models\NoticeboardPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class NoticeboardPostController extends Controller
{
    /**
     * Show main Noticeboard
     *
     * @return View
     */
    public function index():View
    {
        $noticeboardPosts = NoticeboardPost::displayAllIfAdmin();
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

        return redirect(route('noticeboard'))->with('success', 'Your post has been published.');
    }


}


