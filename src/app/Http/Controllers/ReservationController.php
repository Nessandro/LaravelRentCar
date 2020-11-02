<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('user', 'car')->get()->toArray();

        return response()->json(['reservations' => $reservations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['user_id', 'car_id', 'start_date', 'finish_date']);
        $reservation = new Reservation($input);
        $reservation->save();

        return response()->json(['reservation' => $reservation]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::with('user', 'car')->where('id', $id)->get()->toArray();
        return response()->json(['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['user_id']);
        $reservation = Reservation::where('id', $id)->update($input);

        return response()->json(['reservation' => $reservation]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancel($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        if(!$reservation)
        {
            return response()->json(['message' => "The reservation with id {$id} not found."], 404);
        }
        $reservation->cancel();

        return response()->json(['reservation' => $reservation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id)->first();
        if(!$reservation)
        {
            return response()->json(['message' => "The reservation with id {$id} not found."], 404);
        }
        $reservation->delete();
        return response()->json(['reservation' => ['deleted' => true]]);
    }
}

