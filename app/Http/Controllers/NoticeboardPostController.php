<?php

namespace App\Http\Controllers;

use App\Models\NoticeboardPost;
use Illuminate\Http\Request;

class NoticeboardPostController extends Controller
{
    public function index()
    {
        return view('noticeboard.index', [
            'noticeboardposts' => NoticeboardPost::where('building_code', request()->user()->building_code)->paginate(5)
        ]);
    }

    public function create()
    {
        return view('noticeboard.create');
    }

    public function show(NoticeboardPost $noticeboardpost)
    {
        return view('noticeboard.show', [
            'noticeboardpost' => $noticeboardpost
        ]);
    }



}
// request()->user()->building_code

