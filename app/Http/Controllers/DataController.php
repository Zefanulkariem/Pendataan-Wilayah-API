<?php

namespace App\Http\Controllers;
use App\Models\Centre_Point;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function centrepoint()
    {
        $centrepoint = Centre_Point::latest()->get();
        return datatables()->of($centrepoint)
        ->addColumn('action','backend.CentrePoint.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
