<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Knp\Snappy\Pdf;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
{
    //COUNTRIES LIST

    public function index()
    {
        return view('countries-list');
    }

    //ADD NEW COUNTRY
    public function addCountry(Request $request)
    {

//        return $request->country_image;
        $country = new Country();
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;

        if ($request->hasFile('country_image')) {

            $image = $request->file('country_image');
            $path = 'public/images/';
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->storeAs($path, $image_name);

            $country->country_image = $image_name;

        }

        $query = $country->save();

        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'New Country has been successfully saved']);
        }

    }

    // GET ALL COUNTRIES
    public function getCountriesList(Request $request)
    {
        $countries = Country::all();
        return DataTables::of($countries)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                                                <button class="btn btn-sm btn-primary" data-eid="' . $row['id'] . '" id="editCountryBtn">Update</button>
                                                <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteCountryBtn">Delete</button>
                                          </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    //GET COUNTRY DETAILS
    public function getCountryDetails(Request $request)
    {
        $country_id = $request->country_id;
        $countryDetails = Country::find($country_id);
        return response()->json(['details' => $countryDetails]);
    }

    //UPDATE COUNTRY DETAILS
    public function updateCountryDetails(Request $request)
    {
        $country_id = $request->cid;

        $country = Country::find($country_id);
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;

        if ($request->hasFile('country_image')) {

            $image = $request->file('country_image');
            $path = 'public/images/';
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->storeAs($path, $image_name);

            $country->country_image = $image_name;

        }

        $query = $country->save();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Country Details have Been updated']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }

    }

    // DELETE COUNTRY RECORD
    public function deleteCountry(Request $request)
    {
        $country_id = $request->country_id;
        $query = Country::find($country_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Country has been deleted from database']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }

    public function downloadpdf(){
        $pdf = SnappyPdf::loadView('home');
        return $pdf->download('home.pdf');

    }

}
