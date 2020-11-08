<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::with('user', 'car')
            ->where('user_id', Auth::id())
            ->get()
            ->toArray();

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
     * @param Reservation $reservation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);

        return response()->json(['reservation' => $reservation->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Reservation $reservation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Reservation $reservation)
    {
        $input = $request->except(['user_id']);
        $this->authorize('update', $reservation);
        $reservation->update($input);

        return response()->json(['reservation' => $reservation]);
    }

    /**
     * @param Reservation $reservation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function cancel(Reservation $reservation)
    {
        $this->authorize('update', $reservation);

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

