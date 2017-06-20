<?php
namespace IncidentManagement\Controllers;

use App\Http\Controllers\Controller;
use IncidentManagement\Requests;
use Illuminate\Http\Request;
use IncidentManagement\Repositories\Incident\IncidentInterface;

class IncidentController extends Controller {

	public $incident;

	/**
	 * [__construct]
	 * @param IncidentInterface $incident
	 */
	function __construct(IncidentInterface $incident)
	{
		$this->incident = $incident;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->incident->index();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return $this->incident->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreIncidentRequest $request)
	{
		return $this->incident->store($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->incident->show($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $this->incident->edit($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\EditIncidentRequest $request,$id)
	{
		return $this->incident->update($request,$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return $this->incident->delete($id);
	}

}
