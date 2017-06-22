<?php
namespace IncidentManagement\Requests;

use App\Http\Requests\Request;

class EditIncidentStatusRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'status_id' => 'required|exists:incident_statuses,id'
		];
	}

	public function messages()
	{
		return [
			'status_id.required' => 'Please select the status',
			'status_id.exsits' => 'Please select the status from the dropdown',
		];
	}

}
