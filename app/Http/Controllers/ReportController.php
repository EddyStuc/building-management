<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ReportController extends Controller
{
   /**
     * Show all Building Reports
     *
     * @return View
     */
    public function index(): View
    {
        $reports = Report::displayAllIfAdmin();
        return view('reports.index', compact('reports'));
    }

    /**
     * create Building Report page
     *
     * @return View
     */
    public function create(): View
    {
        return view('reports.create');
    }

    /**
     * show Building Report page
     *
     * @param  string $buildingReport
     * @return View
     */
    public function show(Report $report): View
    {
        return view('reports.show', compact('report'));
    }


    /**
     * validate and store new Building Report
     *
     * @return void
     */
    public function store()
    {
       $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('reports', 'slug')],
            'subject' => 'required',
            'body' => 'required',
        ]);

        $attributes['user_id'] = Auth::user()->id;
        $attributes['building_id'] = Auth::user()->building_id;

        Report::create($attributes);

        return redirect(route('reports'))->with('success', 'Your report has been published.');
    }

}
