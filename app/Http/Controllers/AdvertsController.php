<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvertsModel;
use App\Models\AdvertBookingsModel;

class AdvertsController extends Controller
{
    function index()
    {
        $adverts = AdvertsModel::get();
        return view('listAdverts')->with(compact('adverts'));
    }

    function create(Request $request)
    {
        if(!$request->title)
        {
            return redirect()->back()->withInput();
        }

        $va = new AdvertsModel();
        $va->title = $request->title;
        $va->description = $request->description;
        $va->status = 1;
        $va->save();

        return redirect()->back();
    }

    function edit(Request $request)
    {
        if(!$request->stude_id || $request->name)
        {
            redirect()->back();
        }

        AdvertsModel::where('id', $request->stude_id)->update([
            'title' => $request->name,
            'description' => $request->contact,
        ]);

        return redirect()->back();
    }

    function delete($id)
    {
        if(!$id)
        {
            redirect()->back();
        }

        AdvertsModel::where('id', $id)->delete();

        return redirect()->back();
    }

    function booking(Request $request)
    {
        $this->validate($request, [
            'advertID' => 'required',
            'name' => 'required',
            'email' => 'required',
            // 'cover_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try 
        {
            if(AdvertBookingsModel::where('advertID', $request->advertID)->where('name', $request->name)->where('email', $request->email)->exists())
            {
                return redirect()->back()->withInput();
            }
            else
            {
                $vaIN = new AdvertBookingsModel();
                $vaIN->name = $request->name;
                $vaIN->email = $request->email;
                $vaIN->advertID = $request->advertID;
                $vaIN->status = 1;
                $vaIN->save();
                return redirect()->back();

            }

        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }

    function getBookedAdverts()
    {
        $adverts = AdvertBookingsModel::leftJoin('adverts', 'adverts.id', '=', 'advert_booking.advertID')->get();
        return view('listBookedAdverts')->with(compact('adverts'));
    }
}
