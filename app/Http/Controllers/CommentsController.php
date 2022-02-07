<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * validate and store Comment on a Report
     *
     * @param  mixed $report
     * @return void
     */
    public function store(StoreCommentRequest $request, Report $report)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $report->comments()->create($attributes);

        return back()->with('success', 'Comment posted');
    }
}
