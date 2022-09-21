<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorStoreRequest;
use App\Http\Requests\VisitorUpdateRequest;
use App\Models\Apartment;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completedVisitors=Visitor::whereNotNull('remarks')->get();
        return view('admin.visitors.index',compact('completedVisitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments=Apartment::get();
        return view('admin.visitors.create',compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorStoreRequest $request)
    {
            //store visitor
        
            Visitor::create([

            'visitor_name'=>$request->visitor_name,
            'mobile_num'=>$request->mobile_num,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'apartment_num'=>$request->apartment_num,
            'whom_to_meet'=>$request->whom_to_meet,
            'reason'=>$request->reason,
            ]);

        //redirect to visitor list
        return redirect()->route('admin.visitors.checkoutList')->with('success','Visitor Successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        return view('admin.visitors.show',compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        return view('admin.visitors.edit',compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorUpdateRequest $request, Visitor $visitor)
    {
            //update visitor
            $visitor->remarks=$request->remarks;
            $visitor->save();
    
            //redirect to current visitor list
            return redirect()->route('admin.visitors.checkoutList')->with('success','Visitor Successfully CHECK-OUT!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }

    public function checkoutList()
    {
        $currentVisitors=Visitor::whereNull('remarks')->get();
        return view('admin.visitors.checkout-list',compact('currentVisitors'));
    }

    public function search()
    {
        $search_text=$_GET['query'];
        // $ret=mysqli_query($con,"SELECT * from tblvisitor where VisitorName like '$sdata%' ||MobileNumber like '$sdata%' ||WhomtoMeet like '$sdata%' ||Apartment like '$sdata%'");

        $visitors=Visitor::where('visitor_name','LIKE','%'.$search_text.'%')->get();
        return view('admin.visitors.search-list',compact('visitors','search_text'));
    }

}
