<?php
namespace IncidentManagement\Requests;

use App\Http\Requests\Request;

class EditIncidentRequest extends Request {

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
			'priority_id' => 'required|exists:incident_priorities,id'
		];
	}

	public function messages()
	{
		return [
			'form_answer.required' => 'Please Fill the Form.',
		];
	}

}
