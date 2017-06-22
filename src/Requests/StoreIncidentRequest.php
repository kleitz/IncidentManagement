<?php
namespace IncidentManagement\Requests;

use App\Http\Requests\Request;

class StoreIncidentRequest extends Request {

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
			'form_answer' => 'required',
			'incident_type_id' => 'required|exists:incident_types,id',
			'priority_id' => 'required|exists:incident_priorities,id'
		];
	}

	public function messages()
	{
		return [
			'form_answer.required' => 'Please Fill the Form.',
			'incident_type_id.exists' => 'Please Select Incident Type from the List.',
			'incident_type_id.required' => 'Please Select Incident Type.',
			'priority_id.exists' => 'Please Select Incident Priority from the List.',
			'priority_id.required' => 'Please Select Incident Priority.',
		];
	}

}
