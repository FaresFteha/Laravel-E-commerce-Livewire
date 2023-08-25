<?php

namespace App\Http\Controllers\Backend\Slaeder;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\RepositoryInterface\slederIntrface;
use Illuminate\Http\Request;

class SlaederController extends Controller
{
    private $Sleder;

    public function __construct(slederIntrface $Sleder)
    {
        $this->Sleder = $Sleder;
    }

    public function index()
    {
        return  $this->Sleder->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Sleder->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {
        return $this->Sleder->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->Sleder->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderFormRequest $request, $id)
    {
        //
        return $this->Sleder->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        return $this->Sleder->destroy($request);
    }
}
