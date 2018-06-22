<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Store;

class StoreController extends Controller
{
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode($this->store->get(['name', 'address', 'number']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return json_encode($store);
    }
}
