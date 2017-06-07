<?php
namespace IncidentManagement\Repositories\IncidentManagement;
use IncidentManagement\Models\Incident;
use Auth;
class IncidentManagementRepository implements IncidentManagementInterface
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$incidents = Incident::all();
		return view('vendor.IncidentManagement.index')->with('incidents',$incidents);
	}

	/**
	 * [show description]
	 * @param  [int] $id [Incident Running ID]
	 * @return [type]     [description]
	 */
	public function show($id)
	{
		$incident = Incedent::findOrFail($id);
		return view('vendor.IncedentManagement.view')->with('incident',$incident);
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create()
	{
		return view('vendor.IncidentManagement.create');
	}

	/**
	 * [store description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
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
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id)
	{
		$incident = Incident::findOrFail($id);
		return view('vendor.IncidentManagement.edit')->with('incident',$incident);
	}

	/**
	 * [update description]
	 * @param  [type] $request [description]
	 * @param  [type] $id      [description]
	 * @return [type]          [description]
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
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id)
	{
		$incident = Incident::findOrFail($id);
		$incident->delete();
		return redirect()->back();
	}
}
