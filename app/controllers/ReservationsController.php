<?php

class ReservationsController extends \BaseController {

	/**
	 * Display a listing of reservations
	 *
	 * @return Response
	 */
	public function index()
	{
		$reservations = Reservation::all();

		return View::make('reservations.index', compact('reservations'));
	}

	/**
	 * Show the form for creating a new reservation
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reservations.create');
	}

	/**
	 * Store a newly created reservation in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Reservation::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Reservation::create($data);

		return Redirect::route('reservations.index');
	}

	/**
	 * Display the specified reservation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reservation = Reservation::findOrFail($id);

		return View::make('reservations.show', compact('reservation'));
	}

	/**
	 * Show the form for editing the specified reservation.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reservation = Reservation::find($id);

		return View::make('reservations.edit', compact('reservation'));
	}

	/**
	 * Update the specified reservation in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reservation = Reservation::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Reservation::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$reservation->update($data);

		return Redirect::route('reservations.index');
	}

	/**
	 * Remove the specified reservation from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Reservation::destroy($id);

		return Redirect::route('reservations.index');
	}

}
