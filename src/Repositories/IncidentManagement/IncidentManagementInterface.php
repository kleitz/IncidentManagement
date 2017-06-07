<?php
namespace IncidentManagement\Repositories\IncidentManagement;

interface IncidentManagementInterface
{
	public function index();
	public function show($id);
	public function create();
	public function store($request);
	public function edit($id);
	public function update($request,$id);
	public function delete($id);

}
