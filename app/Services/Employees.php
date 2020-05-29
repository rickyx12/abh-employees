<?php
namespace App\Services;
  
use App\Services\Contracts\EmployeesInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Employees implements EmployeesInterface
{

    public function show() {

        return DB::select("SELECT * FROM employees");
    }

    public function add(Request $req) 
    {
      
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'contactNo' => 'required',
            'emailAddress' => 'required',
            'position' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'emergencyContact' => 'required'
        ]);     

        $name = $req->input('name');
        $address = $req->input('address');
        $birthday = $req->input('birthday');
        $age = $req->input('age');
        $contactNo = $req->input('contactNo');
        $emailAddress = $req->input('emailAddress');
        $position = $req->input('position');
        $department = $req->input('department');
        $branch = $req->input('branch');
        $emergencyContact = $req->input('emergencyContact');

        $data = [
            $name,
            $address,
            $birthday,
            $age,
            $contactNo,
            $emailAddress,
            $position,
            $department,
            $branch,
            $emergencyContact
        ];

        DB::insert('INSERT INTO employees(name, address, birthday, age, contact_number, email_address, position, department, branch_assigned, emergency_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
    }


    public function update(Request $req) 
    {
      
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'age' => 'required',
            'contactNo' => 'required',
            'emailAddress' => 'required',
            'position' => 'required',
            'department' => 'required',
            'branch' => 'required',
            'emergencyContact' => 'required'
        ]);     

        $id = $req->input('id');
        $name = $req->input('name');
        $address = $req->input('address');
        $birthday = $req->input('birthday');
        $age = $req->input('age');
        $contactNo = $req->input('contactNo');
        $emailAddress = $req->input('emailAddress');
        $position = $req->input('position');
        $department = $req->input('department');
        $branch = $req->input('branch');
        $emergencyContact = $req->input('emergencyContact');

        $data = [
            $name,
            $address,
            $birthday,
            $age,
            $contactNo,
            $emailAddress,
            $position,
            $department,
            $branch,
            $emergencyContact,
            $id
        ];

        DB::insert('UPDATE employees SET name = ?, address = ?, birthday = ?, age = ?, contact_number = ?, email_address = ?, position = ?, department = ?, branch_assigned = ?, emergency_contact = ? WHERE id = ?', $data);
    }

    public function delete(Request $req) {

        $id = $req->input('id');

        $data = array($id);

        DB::delete('DELETE FROM employees WHERE id = ?', $data);
    }
}