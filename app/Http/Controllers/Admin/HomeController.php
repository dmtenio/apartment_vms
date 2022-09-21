<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
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
