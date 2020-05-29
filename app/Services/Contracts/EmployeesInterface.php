<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;
  
Interface EmployeesInterface
{

	public function show();

	public function add(Request $req);

	public function update(Request $req);

	public function delete(Request $req);
}