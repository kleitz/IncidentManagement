<?php
namespace IncidentManagement\Repositories\Incident;
use IncidentManagement\Models\Incident;
use IncidentManagement\Models\IncidentType;
use IncidentManagement\Models\IncidentPriority;
use IncidentManagement\Models\IncidentStatus;
use IncidentManagement\Models\IncidentLog;
use Auth;
use FormBuilder\Models\Form;
use WorkStream\Models\Workstream;
use FormBuilder\Repositories\FormAnswer\FormAnswerInterface;

class IncidentRepository implements IncidentInterface
{
	public function __construct(FormAnswerInterface $form_answer)
	{
		$this->form_answer = $form_answer;
		$this->open_status_id = 1;
	}

	/**
	 * [index description]
	 * @return view     [incidentmanagement/index]
	 */
	public function index()
	{
		$incidents = Auth::user()->getAllIncidents();
				
		// $incident_statuses = IncidentStatus::all();
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
		$statuses = IncidentStatus::all();
		return view('vendor.IncidentManagement.Incident.view')
								->with('incident',$incident)
								->with('statuses',$statuses);
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
		$incident_priorities = IncidentPriority::all();
		return view('vendor.IncidentManagement.Incident.create')
								->with('incident_types',$incident_types)
								->with('incident_type_json',$incident_types->toJson())
								->with('incident_priorities',$incident_priorities);
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
		$input['status_id']   = $this->open_status_id;
		$input['level_id']		= Auth::user()->level_id;
		$incident_type 				= IncidentType::findOrFail($input['incident_type_id']);
		$incident_form_answer = $this->form_answer->storeFormAnswer($incident_type->form,json_decode($input['form_answer']));
		$input['form_answer_id'] = $incident_form_answer->id;
		$incident = Incident::create($input);
		IncidentLog::create([
			'incident_id' => $incident->id,
			'updated_by'	=> Auth::user()->id,
			'action'			=> 'created',
		]);
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
		$incident_priorities = IncidentPriority::all();

		return view('vendor.IncidentManagement.Incident.edit')
								->with('incident',$incident)
								->with('incident_priorities',$incident_priorities);
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
		if($incident->created_by != Auth::user()->id){
			return redirect()->back();
		}
		$incident->name = $input['name'];
		$incident->description = $input['description'];
		$incident->priority_id = $input['priority_id'];
		$incident->save();
		$this->form_answer->updateFormAnswer($incident->formAnswer,json_decode($input['form_answer']));
		IncidentLog::create([
			'incident_id' => $incident->id,
			'updated_by'	=> Auth::user()->id,
			'action'			=> 'updated',
		]);
		return redirect('incident');
	}

	/**
	 * [delete description]
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     [back]
	 */
	public function delete($id)
	{
		$incident = Incident::findOrFail($id);
		$incident->delete();
		IncidentLog::create([
			'incident_id' => $incident->id,
			'updated_by'	=> Auth::user()->id,
			'action'			=> 'deleted',
		]);
		return redirect()->back();
	}

	/**
	 * [statusUpdate]
	 * @param  Request $request EditIncidentStatusRequest
	 * @param  Int $id      running Id for .
	 * @return [type]          [description]
	 */
	public function statusUpdate($request,$id)
	{
		$incident = Incident::findOrFail($id);
		$incident->status_id = $request->status_id;
		$incident->save();
		IncidentLog::create([
			'incident_id' => $incident->id,
			'updated_by'	=> Auth::user()->id,
			'action'			=> 'updated status',
		]);
		return redirect()->back();
	}
}
