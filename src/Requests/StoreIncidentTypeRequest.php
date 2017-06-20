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
			'form_id' => 'required|exists:forms,id',
			'workstream_ids' => 'required|array',
		];
	}

	public function messages()
	{
		return [
			'form_id.required' => 'Please Select Form.',
			'form_id.exists' => 'Please Select Form In the List.',
			'workstream_ids.required' => 'Please Select Workstreams.',
		];
	}

}
