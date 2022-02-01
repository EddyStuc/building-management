<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        $reports = Gate::allows('admin') ? Report::latest()->filter(request(['search']))->paginate(10)
                                        : Auth::user()->building->reports()->filter(request(['search']))->paginate(10);

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
    public function store(StoreReportRequest $request)
    {

        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $attributes['building_id'] = Auth::user()->building_id;

        Report::create($attributes);

        return redirect(route('reports'))->with('success', 'Your report has been published.');
    }

    /**
     * edit page for individual Reports
     *
     * @param  mixed $report
     * @return void
     */
    public function edit(Report $report)
    {
        if (! Gate::allows('allowEdit', $report)) {
            abort(403);
        }
        return view('reports.edit', ['report' => $report]);
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

        return redirect(route('reports'))->with('success', 'Report Updated!');
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

        return redirect(route('reports'))->with('success', 'Report Deleted!');
    }

}
