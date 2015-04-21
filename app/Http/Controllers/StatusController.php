<?php namespace StatusHub\Http\Controllers;

use StatusHub\Status;
use StatusHub\User;

use StatusHub\Http\Requests;
use StatusHub\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StatusController extends UserPermissionsController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($userId)
	{
		if ( $this->urlUserId != $this->authUser->id && ! $this->isUrlUserAFriend  ) {
			$message = 'This user is not your friend, so you cannot see their status';
			return view('notify', [ 'message' => $message ]);
		}

		$statuses = User::find($userId)->statuses->toArray();

		return view('status.index', ['statuses'=>$statuses]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('status.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$saved = \Auth::user()
			->statuses()
			->save(new Status([
				'status' => $request->input('status')
			]));

		if ($saved) {
			return view('notify', [ 'message' => 'Successfully saved status' ]);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userId, $id)
	{
		dd($id);
		$status = Status::find($id);

		return view('status.show', [ 'status' => $status ]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($userId, $statusId)
	{
		$status = Status::find($statusId);

		$data = [
			'status' => $status->status,
		];

		return view('status.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		dd('update');
		$status = Status::find($id);
		dd($status);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
