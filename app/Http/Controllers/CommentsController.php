<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * validate and store Comment on a Report
     *
     * @param  mixed $report
     * @return void
     */
    public function store(Report $report)
    {

        request()->validate([
            'body' => ['required']
        ]);

        $report->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Comment posted');
    }
}
