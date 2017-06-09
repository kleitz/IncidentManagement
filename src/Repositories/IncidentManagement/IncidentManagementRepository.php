<?php
namespace IncidentManagement\Repositories\IncidentManagement;
use IncidentManagement\Models\Incident;
use Auth;
class IncidentManagementRepository implements IncidentManagementInterface
{
	/**
	 * [index description]
	 * @return view     [incidentmanagement/index]
	 */
	public function index()
	{
		$incidents = Incident::all();
		return view('vendor.IncidentManagement.index')->with('incidents',$incidents);
	}

	/**
	 * [show description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/view]
	 */
	public function show($id)
	{
		$incident = Incedent::findOrFail($id);
		return view('vendor.IncedentManagement.view')->with('incident',$incident);
	}

	/**
	 * [create description]
	 * @return view     [incidentmanagement/create]
	 */
	public function create()
	{
		return view('vendor.IncidentManagement.create');
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
		return redirect('incident');
	}

	/**
	 * [edit description]
	 * @param  int $id      [runningID inicdents]
	 * @return view     [incidentmanagement/index]
	 */
	public function edit($id)
	{
		$incident = Incident::findOrFail($id);
		return view('vendor.IncidentManagement.edit')->with('incident',$incident);
	}

	/**
	 * [update description]
	 * @param  Request $request
	 * @param  int $id      [runningID inicdents]
	 * @return redirect     	[incident]
	 */
	public function update($request,$id)
	{
		$incident = Incident::findOrFail($id);
		$incident->name = $request->name;
		$incident->description = $request->description;
		$incident->save();
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
		return redirect()->back();
	}
}
