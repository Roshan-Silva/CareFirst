<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function Index(){
        return view('admin.home.slider');
    }

    public function storeslider(Request $request){
        $validatedData = $request->validate([
            'top_heading'          => 'required',
            'bottom_sub_heading'   => 'required|string|max:255',
            'img_link'             =>'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'get_appointment_link' => 'nullable|url',

        ]);

        if($request->hasFile('img_link')){
            $imagePath = $request->file('img_link')->store('slides','public');
        }

        Slider::create([
            'top_heading'          => $validatedData['top_heading'],
            'bottom_sub_heading'   => $validatedData['bottom_sub_heading'],
            'img_link'             => $imagePath,
            'get_appointment_link' => $validatedData['get_appointment_link'],
        ]);

        return redirect()->back()->with('success','Slide added successfully.');
    }
}
