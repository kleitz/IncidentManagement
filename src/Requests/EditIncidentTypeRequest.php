<?php
namespace IncidentManagement\Requests;

use App\Http\Requests\Request;

class EditIncidentTypeRequest extends Request {

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
			'workstream_id' => 'required',
		];
	}

	public function messages()
	{
		return [
			'form_id.required' => 'Please Select Forms.',
			'form_id.exists' => 'Please Select Form In the List.',
			'workstream_id.required' => 'Please Select Workstream.',
		];
	}

}
