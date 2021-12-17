<?php

namespace App\Http\Controllers;

use App\Models\NoticeboardPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NoticeboardPostController extends Controller
{
    public function index()
    {
        $noticeboardPosts = NoticeboardPost::where('building_code', Auth::user()->building_code)->paginate(5);
        return view('noticeboard.index', compact('noticeboardPosts'));

    }

    public function create()
    {
        return view('noticeboard.create');
    }

    /**
     * show Noticeboard Post page
     *
     * @param  string $noticeboardPost
     * @return View
     */
    public function show(NoticeboardPost $noticeboardPost): View
    {
        return view('noticeboard.show', compact('noticeboardPost'));
    }


}


