<?php namespace StatusHub\Http\Controllers;

use StatusHub\Status;
use StatusHub\User;

use StatusHub\Http\Requests;
use StatusHub\Http\Requests\StoreStatusRequest;

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

		$statuses = User::find($userId)->statuses()->orderBy('created_at', 'DESC')->get()->toArray();

		return view('status.index', ['statuses' => $statuses]);
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
		$saved = $this->authUser->statuses()->save(new Status( $request->all() ));

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
		$userOwnsThis = Status::where('id', $statusId)
				->where('user_id', \Auth::id())->exists();

		if ( ! $userOwnsThis ) {
			return 'This is not yours!';
		}

		$status = Status::find($statusId);

		$data = [
			'status' => $status,
		];

		return view('status.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($userId, $statusId, Request $request)
	{
		$status = Status::find($statusId);
		$status->status = $request->input('status');
		$status->save();

		return 'updated';
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
