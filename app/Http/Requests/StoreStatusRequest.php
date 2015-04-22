<?php namespace StatusHub\Http\Requests;

use StatusHub\Http\Requests\Request;
use StatusHub\Status;

class StoreStatusRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$statusId = $this->route('status');

		$count = Status::where('id', $statusId)
			->where('user_id', \Auth::id())->count();

		return ($count > 0 ? true : false);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'status' => 'required'
		];
	}

}
