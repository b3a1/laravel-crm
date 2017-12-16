<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::orderBy('id', 'desc');

        if(request('title'))
        {
            $logs = $logs->where('title', 'like', '%'.request('search').'%');
                        // ->where('description', 'like', '%'.$searchParam.'%')
                        // ->where('body', 'like', '%'.$searchParam.'%')
                        // ->where('created_at', 'like', '%'.$searchParam.'%')
                        // ->where('updated_at', 'like', '%'.$searchParam.'%');
        }
        if(request('desc'))
        {
            $logs = $logs->where('description', 'like', '%'.request('search').'%');
        }
        if(request('body'))
        {
            $logs = $logs->where('body', 'like', '%'.request('search').'%');
        }
        if(request('created_at'))
        {
            $logs = $logs->where('created_at', 'like', '%'.request('search').'%');
        }
        if(request('updated_at'))
        {
            $logs = $logs->where('updated_at', 'like', '%'.request('search').'%');
        }

        $logs = $logs->paginate(10);

        return view('logs.index', ['title'=>'View Logs', 'logs'=>$logs]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
