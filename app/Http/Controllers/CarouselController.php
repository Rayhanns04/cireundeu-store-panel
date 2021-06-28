<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $carousels = Carousel::where('title', 'LIKE','%'.$request->search.'%')->get();
        } else {
            $carousels = Carousel::all();
        }

        return view('carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields']);
        }

        $nm = $request->image;
        $fileName = time().rand(100,999).".".$nm->getClientOriginalExtension();

        $carousels = new Carousel;
        $carousels->title = $request->title;
        $carousels->image = $fileName;

        $nm->move(public_path()."/assets/images/carousels", $fileName );
        $carousels->save();

        Session::flash('statuscode', 'success');
        return redirect('/carousels')->with('status', 'Success create new product!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'image' => 'required',
            'title' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'invalid fields']);
        }

        $carousel = Carousel::findOrFail($id);
        $before = $carousel->image;

        $carousel->title = $request->title;
        $request->image->move(public_path()."/assets/images/carousels", $before);
        $carousel->update();

        Session::flash('statuscode', 'success');
        Session::flash('message', ($carousel->title));
        return redirect('/carousels')->with('status', 'Success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $carousel = Carousel::findOrFail($id);
       $file = public_path("assets\images\carousels\\".$carousel->image);

       if (file_exists($file)) {
           @unlink($file);
       }

       $carousel->delete();
       return redirect('/carousels');
    }
}
