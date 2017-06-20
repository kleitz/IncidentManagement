<?php
namespace IncidentManagement\Repositories\Incident;
use IncidentManagement\Models\Incident;
use IncidentManagement\Models\IncidentType;
use Auth;
use FormBuilder\Models\Form;
use WorkStream\Models\Workstream;
class IncidentRepository implements IncidentInterface
{
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
			 $incident_type->forms;
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
		$input['created_by'] = Auth::user()->id;
		$incident = Incident::create($input);
		if ($request->ajax()) {
			$incident_type = $incident->incidentType;
			$forms = $incident_type->forms;
			$out_array  = [
				'incident' => $incident,
				'forms'	=> $forms,
			];
			return $out_array;
		}
		return redirect('incident');
	}

	/**
	 * [edit description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/index]
	 */
	public function edit($id)
	{
		$incident_type = Incident::findOrFail($id);
		$forms = Form::all();
		$workstreams = Workstream::all();
		return view('vendor.IncidentManagement.Incident.edit')
								->with('incident_type',$incident_type)
								->with('forms',$forms)
								->with('workstreams',$workstreams);
	}

	/**
	 * [update description]
	 * @param  Request $request
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     	[incident]
	 */
	public function update($request,$id)
	{
		$input = $request->all();
		$incident_type = Incident::findOrFail($id);
		$incident_type->name = $request->name;
		$incident_type->description = $request->description;
		$incident_type->save();
		$incident_type->forms()->sync($input['form_ids']);
		$incident_type->workstreams()->sync($input['workstream_ids']);
		return redirect('incident/type');
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
