<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\EmployeesInterface;
		

class Employees extends Controller
{
 
	private $employees;

	public function __construct(EmployeesInterface $employees) {
		$this->employees = $employees;
	}

	public function index() {
		return view('main');
	}

	public function show() {
		return response()->json($this->employees->show());
	}

	public function add(Request $req) {
		$this->employees->add($req);			 
	}

	public function update(Request $req) {
		$this->employees->update($req);
	}

	public function delete(Request $req) {
		$this->employees->delete($req);
	}
}
