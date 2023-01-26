<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visitor;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $completedVisitors=Visitor::whereNotNull('remarks')->count();
        $onGoingVisitors=Visitor::whereNull('remarks')->count();
        $occupiedApartments=Apartment::where('status','owned')->count();
        $availableApartments=Apartment::where('status','empty')->count();
        return view('admin.dashboard',compact('completedVisitors','onGoingVisitors','occupiedApartments','availableApartments'));
    }
}
