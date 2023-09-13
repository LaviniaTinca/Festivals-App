<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class AdminReportController extends Controller
{
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Users by years',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 3000, // show only last 30 days
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Sold Tickets by years',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\SoldTicket',
            'group_by_field' => 'sold_at',
            'group_by_period' => 'year',
            'chart_type' => 'line',
        ];

        $chart3 = new LaravelChart($chart_options);

        return  view('admin.reports.index', compact('chart1', 'chart3'));;
    }
}
