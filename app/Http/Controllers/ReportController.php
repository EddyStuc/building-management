<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Show all Building Reports
     *
     * @return View
     */
    public function index(Request $request): View
    {
        $reports = (new Report())->showAllIfAdmin();
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
        $attributes = $request->safe()->merge([
            'user_id' => Auth::user()->id,
            'building_id' => Auth::user()->building_id,
            'slug' => str($request['title'])->slug()
        ])->all();

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
        if (!Gate::allows('allowEdit', $report)) {
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
    public function update(UpdateReportRequest $request, Report $report)
    {
        $attributes = $request->safe()->merge([
            'slug' => str($request['title'])->slug()
        ])->all();

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
