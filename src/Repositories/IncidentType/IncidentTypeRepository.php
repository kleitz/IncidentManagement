<?php
namespace IncidentManagement\Repositories\IncidentType;
use IncidentManagement\Models\IncidentType;
use Auth;
class IncidentTypeRepository implements IncidentTypeInterface
{
	/**
	 * [index description]
	 * @return view     [incidentmanagement/index]
	 */
	public function index()
	{
		$incident_types = IncidentType::all();
		return view('vendor.IncidentManagement.IncidentType.index')->with('incident_types',$incident_types);
	}

	/**
	 * [show description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/view]
	 */
	public function show($id)
	{
		$incident_type = IncidentType::findOrFail($id);
		return view('vendor.IncidentManagement.IncidentType.view')->with('incident_type',$incident_type);
	}

	/**
	 * [create description]
	 * @return view     [incidentmanagement/create]
	 */
	public function create()
	{
		return view('vendor.IncidentManagement.IncidentType.create');
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
		$incident_type = IncidentType::create($input);
		return redirect('incident/type');
	}

	/**
	 * [edit description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/index]
	 */
	public function edit($id)
	{
		$incident_type = IncidentType::findOrFail($id);
		return view('vendor.IncidentManagement.IncidentType.edit')->with('incident_type',$incident_type);
	}

	/**
	 * [update description]
	 * @param  Request $request
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     	[incident]
	 */
	public function update($request,$id)
	{
		$incident_type = IncidentType::findOrFail($id);
		$incident_type->name = $request->name;
		$incident_type->description = $request->description;
		$incident_type->save();
		return redirect('incident/type');
	}

	/**
	 * [delete description]
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     [back]
	 */
	public function delete($id)
	{
		$incident_type = IncidentType::findOrFail($id);
		$incident_type->delete();
		return redirect()->back();
	}
}
