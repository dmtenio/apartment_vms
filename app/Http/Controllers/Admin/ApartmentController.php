<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentStoreRequest;
use App\Http\Requests\ApartmentUpdateRequest;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments=Apartment::get();
        return view('admin.apartments.index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentStoreRequest $request)
    {
        Apartment::create([

            'apartment_num'=>$request->apartment_num,
            'building_num'=>$request->building_num,
            'status'=>$request->status,
        ]);

        //redirect to apartment list
        return redirect()->route('admin.apartments.index')->with('success','Apartment Successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentUpdateRequest $request, Apartment $apartment)
    {
        //update specific data
        $apartment->apartment_num=$request->apartment_num;
        $apartment->building_num=$request->building_num;
        $apartment->status=$request->status;
        $apartment->save();
      
        //redirect to apartment list
        return redirect()->route('admin.apartments.index')->with('success','Apartment Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
       //delete
       $apartment->delete();

       //redirect to apartment list
       return redirect()->route('admin.apartments.index')->with('success','Apartment Successfully deleted!');
    }
}
