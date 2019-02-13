<?php

namespace sidelines\Http\Controllers;

use Illuminate\Http\Request;

use sidelines\Http\Requests;
use sidelines\Http\Controllers\Controller;

class PartnershipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('partnership', ['only' => ['index', 'acceptPartnership']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = \Auth::user()->userable->partners->where('status', 1);

        return view('partnership.index', compact('partners'));
    }
}
