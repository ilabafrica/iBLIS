<?php

class ThirdPartyAccessController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$thirdPartyAccesses = ThirdPartyAccess::all();
		return View::make('user.tpaaccess.index')->with('thirdPartyAccesses', $thirdPartyAccesses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::all();

		$grantTypes = [
			'password',
			'implicit',
			'client_credentials',
			'authorization_code',
		];

		return View::make('user.tpaaccess.create')
			->with('grantTypes', $grantTypes)
			->with('users', $users);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$thirdPartyAccess = new ThirdPartyAccess;
		$thirdPartyAccess->user_id = Input::get('user_id');
		$thirdPartyAccess->username = Input::get('username');
		$thirdPartyAccess->email = Input::get('email');
		$thirdPartyAccess->password = Input::get('password');
		$thirdPartyAccess->grant_type = Input::get('grant_type');
		$thirdPartyAccess->client_id = Input::get('client_id');
		$thirdPartyAccess->client_secret = Input::get('client_secret');
		$thirdPartyAccess->save();

		// redirect
		return Redirect::to('tpaaccess');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$users = User::all();
		$thirdPartyAccess = ThirdPartyAccess::find($id);
		$grantTypes = [
			'password',
			'implicit',
			'client_credentials',
			'authorization_code',
		];
		return View::make('user.tpaaccess.edit')
			->with('grantTypes', $grantTypes)
			->with('thirdPartyAccess', $thirdPartyAccess)
			->with('users', $users);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Update
		$thirdPartyAccess = ThirdPartyAccess::find($id);
		$thirdPartyAccess->user_id = Input::get('user_id');
		$thirdPartyAccess->username = Input::get('username');
		$thirdPartyAccess->email = Input::get('email');
		$thirdPartyAccess->password = Input::get('password');
		$thirdPartyAccess->grant_type = Input::get('grant_type');
		$thirdPartyAccess->client_id = Input::get('client_id');
		$thirdPartyAccess->client_secret = Input::get('client_secret');
		$thirdPartyAccess->save();

		// redirect
		return Redirect::to('tpaaccess');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Delete the control
		$thirdPartyAccess = ThirdPartyAccess::find($id);
		$thirdPartyAccess->delete();
		// redirect
		return Redirect::to('tpaaccess');
	}
}