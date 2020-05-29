<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.js"></script>
</head>
<body>

	<nav class="navbar navbar-light bg-dark">
	  <a class="navbar-brand" href="#">
	    <span class="text-light">Employees</span>
	  </a>
	</nav>


	<div class="container">
		<div class="row mt-3">
			<div class="col-md text-right">
				<button class="btn btn-info" data-toggle="modal" data-target="#addModal">New</button>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md">

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Birthday</th>
							<th>Age</th>
							<th>Contact#</th>
							<th>Email</th>
							<th>Position</th>
							<th>Dept</th>
							<th>Branch</th>
							<th>Emergency Contact#</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="employeesTbl"></tbody>
				</table>				

			</div>
		</div>

		<!-- Modal -->
		<div id="addModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">New Employee</h4>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group">
		       		<label>Name</label>
		       		<input type="text" id="name" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Address</label>
		       		<input type="text" id="address" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Birthday</label>
		       		<input type="text" id="birthday" class="form-control datepicker" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Age</label>
		       		<input type="text" id="age" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Contact#</label>
		       		<input type="text" id="contactNo" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Email Add.</label>
		       		<input type="text" id="emailAddress" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Position</label>
		       		<input type="text" id="position" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Dept.</label>
		       		<input type="text" id="department" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Branch Assigned</label>
		       		<input type="text" id="branch" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Emergency Contact#</label>
		       		<input type="text" id="emergencyContact" class="form-control" autocomplete="off">
		       	</div>	       		       		       		       		       		       		       		       		       	
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        <button type="button" id="addEmployeeBtn" class="btn btn-success">Add</button>
		      </div>
		    </div>

		  </div>
		</div>

		<div id="updateModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Update Employee</h4>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group">
		       		<label>Name</label>
		       		<input type="text" id="editName" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Address</label>
		       		<input type="text" id="editAddress" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Birthday</label>
		       		<input type="text" id="editBirthday" class="form-control datepicker" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Age</label>
		       		<input type="text" id="editAge" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Contact#</label>
		       		<input type="text" id="editContactNo" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Email Add.</label>
		       		<input type="text" id="editEmailAddress" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Position</label>
		       		<input type="text" id="editPosition" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Dept.</label>
		       		<input type="text" id="editDepartment" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Branch Assigned</label>
		       		<input type="text" id="editBranch" class="form-control" autocomplete="off">
		       	</div>
		       	<div class="form-group">
		       		<label>Emergency Contact#</label>
		       		<input type="text" id="editEmergencyContact" class="form-control" autocomplete="off">
		       	</div>	       		       		       		       		       		       		       		       		       	
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        <button type="button" id="updateEmployeeBtn" class="btn btn-success" data-dismiss="modal">Update</button>
		      </div>
		    </div>

		  </div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js"></script>
<script src="{{ url('../resources/js/employee.js') }}"></script>
</html>