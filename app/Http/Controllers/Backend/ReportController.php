<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportsAll()
    {
        return view('backend.report.report_all');
    }

    public function reportsSearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatdate = $date->format('d m Y');
        $order = Order::where('order_date', $formatdate)->latest()->get();
        return view('backend.report.report_search', compact('order'));
    }

    public function reportsSearchByMonth(Request $request)
    {
        $order = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.report_search', compact('order'));
    }

    public function reportsSearchByYear(Request $request)
    {
        $order = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.report_search', compact('order'));
    }
}
