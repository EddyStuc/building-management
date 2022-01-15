<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminReportController extends Controller
{
    /**
     * Show admin Noticeboard - all posts
     *
     * @return View
     */
    public function index(): View
    {
        $reports = Report::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

     /**
     * create admin Report page
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.reports.create');
    }

    /**
     * show specific Report
     *
     * @param  mixed $report
     * @return View
     */
    public function show(Report $report): View
    {
        return view('admin.reports.show', compact('report'));
    }

    /**
     * validate and store new Report
     *
     * @return void
     */
    public function store(StoreReportRequest $request)
    {

        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['building_id'] = Auth::user()->building_id;

        Report::create($attributes);

        return redirect(route('admin.reports'))->with('success', 'Your report has been published.');
    }

    /**
     * edit page for individual Reports
     *
     * @param  mixed $report
     * @return void
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit', ['report' => $report]);
    }

    /**
     * validate changes and update Reports
     *
     * @param  mixed $report
     * @return void
     */
    public function update(Report $report)
    {
       $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('reports', 'slug')->ignore($report->id)],
            'subject' => 'required',
            'body' => 'required',
        ]);

        $report->update($attributes);

        return redirect(route('admin.reports'))->with('success', 'Report Updated!');
    }

    /**
     * delete Reports
     *
     * @param  mixed $report
     * @return void
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect(route('admin.reports'))->with('success', 'Report Deleted!');
    }
}
