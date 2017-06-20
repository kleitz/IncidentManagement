<?php
namespace IncidentManagement\Repositories\Incident;
use IncidentManagement\Models\Incident;
use IncidentManagement\Models\IncidentType;
use Auth;
use FormBuilder\Models\Form;
use WorkStream\Models\Workstream;
use FormBuilder\Repositories\FormAnswer\FormAnswerInterface;

class IncidentRepository implements IncidentInterface
{
	public function __construct(FormAnswerInterface $form_answer)
	{
		$this->form_answer = $form_answer;
	}

	/**
	 * [index description]
	 * @return view     [incidentmanagement/index]
	 */
	public function index()
	{
		$incidents = Incident::all();
		return view('vendor.IncidentManagement.Incident.index')->with('incidents',$incidents);
	}

	/**
	 * [show description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/view]
	 */
	public function show($id)
	{
		$incident = Incident::findOrFail($id);
		return view('vendor.IncidentManagement.Incident.view')->with('incident',$incident);
	}

	/**
	 * [create description]
	 * @return view     [incidentmanagement/create]
	 */
	public function create()
	{
		$incident_types = Auth::user()->incidentTypes();
		foreach ($incident_types as $incident_type) {
			 $incident_type->form;
		}
		return view('vendor.IncidentManagement.Incident.create')
								->with('incident_types',$incident_types)
								->with('incident_type_json',$incident_types->toJson());
	}

	/**
	 * [store description]
	 * @param  Request $request
	 * @return redirect          [incident]
	 */
	public function store($request)
	{
		$input = $request->all();
		$input['created_by'] 	= Auth::user()->id;
		$incident_type 				= IncidentType::findOrFail($input['incident_type_id']);
		$incident_form_answer = $this->form_answer->storeFormAnswer($incident_type->form,json_decode($input['form_answer']));
		$input['form_answer_id'] = $incident_form_answer->id;
		Incident::create($input);
		return redirect('incident');
	}

	/**
	 * [edit description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/index]
	 */
	public function edit($id)
	{
		$incident  = Incident::findOrFail($id);
		if($incident->created_by != Auth::user()->id){
			return redirect()->back();
		}
		return view('vendor.IncidentManagement.Incident.edit')
								->with('incident',$incident);
	}

	/**
	 * [update description]
	 * @param  Request $request
	 * @param  int $id      [runningID incidents]
	 * @return redirect     	[incident]
	 */
	public function update($request,$id)
	{
		$input = $request->all();
		$incident = Incident::findOrFail($id);
		$incident->name = $input['name'];
		$incident->description = $input['description'];
		$incident->save();
		$this->form_answer->updateFormAnswer($incident->formAnswer,json_decode($input['form_answer']));
		return redirect('incident');
	}

	/**
	 * [delete description]
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     [back]
	 */
	public function delete($id)
	{
		$incident_type = Incident::findOrFail($id);
		$incident_type->delete();
		return redirect()->back();
	}
}
