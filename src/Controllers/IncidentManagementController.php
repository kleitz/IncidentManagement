<?php
namespace IncidentManagement\Controllers;

use App\Http\Controllers\Controller;
use IncidentManagement\Requests;
use Illuminate\Http\Request;
use IncidentManagement\Repositories\IncidentManagement\IncidentManagementInterface;

class IncidentManagementController extends Controller {

	public $incidentmanagement;

	/**
	 * [__construct]
	 * @param IncidentManagementInterface $incidentmanagement
	 */
	function __construct(IncidentManagementInterface $incidentmanagement)
	{
		$this->incidentmanagement = $incidentmanagement;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->incidentmanagement->index();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->incidentmanagement->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreIncidentRequest $request)
	{
		return $this->incidentmanagement->store($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->incedentmanagement->show($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->incidentmanagement->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\EditIncidentRequest $request,$id)
	{
		return $this->incidentmanagement->update($request,$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->incidentmanagement->delete($id);
	}

}
