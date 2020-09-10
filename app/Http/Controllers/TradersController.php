<?php

namespace App\Http\Controllers;

use Validator;
use App\Auction;
use App\Category;
use App\User;
use App\Trader;
use App\Mail\ConfirmAuction;
use App\Repositories\Auctions;
use App\Http\Requests\AuctionRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradersController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        return view('traders', compact('user'));
    }

    public function store(Request $request)
    {
        $geocodes =app('geocoder')->geocode($request->get('street').', '.$request->get('zip').' '.$request->get('city'))->get();
        $trader = new Trader($request->all());
        $trader->country = 'DE';
        $trader->longitude = 0;
        $trader->latitude = 0;
        //$trader->longitude = $geocodes[0]->getCoordinates()->getLongitude();
        //$trader->latitude = $geocodes[0]->getCoordinates()->getLatitude();
        auth()->user()->publishTrader($trader);
        return $trader;
    }

    public function edit(Trader $trader)
    {
        return $trader;
    }

    public function update(Trader $trader, Request $request)
    {
        $geocodes =app('geocoder')->geocode($request->get('street').', '.$request->get('zip').' '.$request->get('city'))->get();
        $trader->name = $request->name;
        $trader->street = $request->street;
        $trader->zip = $request->zip;
        $trader->city = $request->city;
        $trader->country = 'DE';
        $trader->longitude = 0;
        $trader->latitude = 0;
        /*$trader->longitude = $geocodes[0]->getCoordinates()->getLongitude();
        $trader->latitude = $geocodes[0]->getCoordinates()->getLatitude();
        $trader->country = $geocodes[0]->getCountry()->getCode();*/
        $trader->save();
        return $trader;
    }

    public function destroy(Trader $trader)
    {
        $trader->delete();
        return $trader;
    }
}
