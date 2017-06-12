<?php
namespace IncidentManagement\Requests;

use App\Http\Requests\Request;

class StoreIncidentTypeRequest extends Request {

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
			'name' => 'required|max:255',
			'description' => 'required',
			'form_ids' => 'required|array',
			'workstream_ids' => 'required|array',
		];
	}

	public function messages()
	{
		return [
			'form_ids.required' => 'Please Select Forms.',
			'workstream_ids.required' => 'Please Select Workstreams.',
		];
	}

}
