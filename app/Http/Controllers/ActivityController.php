<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Requests\RegisterFormRequest;
use App\User;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;


    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        //
        $activity = $this->user->activity->get(['name', 'description'])->toArray();

        return $activity;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

}
