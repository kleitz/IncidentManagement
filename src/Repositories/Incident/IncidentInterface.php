<?php
namespace IncidentManagement\Repositories\Incident;

interface IncidentInterface
{
	public function index();
	public function show($id);
	public function create();
	public function store($request);
	public function edit($id);
	public function update($request,$id);
	public function delete($id);
	public function statusUpdate($request,$id);

}
