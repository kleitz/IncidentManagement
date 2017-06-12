<?php
namespace IncidentManagement\Controllers;

use App\Http\Controllers\Controller;
use IncidentManagement\Requests;
use Illuminate\Http\Request;
use IncidentManagement\Repositories\IncidentType\IncidentTypeInterface;

class IncidentTypeController extends Controller {

	public $incident_type;

	/**
	 * [__construct]
	 * @param IncidentTypeInterface $incident_type
	 */
	function __construct(IncidentTypeInterface $incident_type)
	{
		$this->incident_type = $incident_type;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->incident_type->index();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->incident_type->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreIncidentTypeRequest $request)
	{
		return $this->incident_type->store($request);
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
		return $this->incident_type->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\EditIncidentTypeRequest $request,$id)
	{
		return $this->incident_type->update($request,$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->incident_type->delete($id);
	}

}
