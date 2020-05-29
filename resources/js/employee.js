
function getData(baseUrl, preloader) {

	$.ajax({
		url: baseUrl+'/show',
		type: 'GET',
		beforeSend: function() {
			if(preloader) {
				$.LoadingOverlay('show');
			}
		},
		success:function(resultEmp) { 

			$.LoadingOverlay('hide');

			let html = "";


			$.each(resultEmp, function(index, val) {

				$(document).on('click', '#edit'+val.id, function() {

					let id = $('#edit'+val.id).data('id');
					let name = $('#edit'+val.id).data('name');
					let address = $('#edit'+val.id).data('address');
					let birthday = $('#edit'+val.id).data('birthday');
					let age = $('#edit'+val.id).data('age');
					let contactNo = $('#edit'+val.id).data('contactno');
					let emailAddress = $('#edit'+val.id).data('emailaddress');
					let position = $('#edit'+val.id).data('position');
					let department = $('#edit'+val.id).data('department')
					let branch = $('#edit'+val.id).data('branch');
					let emergencyContact = $('#edit'+val.id).data('emergencycontact');

					$('#editName').val(name);
					$('#editAddress').val(address);
					$('#editBirthday').val(birthday);
					$('#editAge').val(age);
					$('#editContactNo').val(contactNo);
					$('#editEmailAddress').val(emailAddress);
					$('#editPosition').val(position);
					$('#editDepartment').val(department);
					$('#editBranch').val(branch);
					$('#editEmergencyContact').val(emergencyContact);

					// $(document).on('click','#updateEmployeeBtn', function() {
						
					// 	let editName = $('#editName').val();
					// 	let editAddress = $('#editAddress').val();
					// 	let editBirthday = $('#editBirthday').val();
					// 	let edit

					// 	let data = {
					// 		id: id,
					// 		name: name,
					// 		address: address,

					// 	}

					// 	$.ajax({
					// 	    headers: {
					// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					// 	    },							
					// 		url: baseUrl+'/update',
					// 		type:'POST',
					// 		data: data,
					// 		beforeSend: function() {
					// 			$.LoadingOverlay('show');
					// 		},
					// 		success: function(result) {
					// 			$('#updateModal').modal('hide');
					// 			getData(baseUrl, false);
					// 		}
					// 	});

					// });


				});


				$(document).on('click','#del'+val.id, function(){
					
					let id = $('#del'+val.id).data('id');
					
					let data = {
						id: id
					}

					$.ajax({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    },						
						url: baseUrl+'/delete',
						type:'POST',
						data: data,
						success:function(result) {
							getData(baseUrl, true);
						}
					});

				});

					html += '<tr>';
					html += '<td>'+val.name+'</td>';
					html += '<td>'+val.address+'</td>';
					html += '<td>'+val.birthday+'</td>';
					html += '<td>'+val.age+'</td>';
					html += '<td>'+val.contact_number+'</td>';
					html += '<td>'+val.email_address+'</td>';
					html += '<td>'+val.position+'</td>';
					html += '<td>'+val.department+'</td>';
					html += '<td>'+val.branch_assigned+'</td>';
					html += '<td>'+val.emergency_contact+'</td>';
					html += '<td><button id="edit'+val.id+'" data-toggle="modal" data-target="#updateModal" data-id="'+val.id+'" data-name="'+val.name+'" data-address="'+val.address+'" data-birthday="'+val.birthday+'" data-age="'+val.age+'" data-contactno="'+val.contact_number+'" data-emailaddress="'+val.email_address+'" data-position="'+val.position+'" data-department="'+val.department+'" data-branch="'+val.branch_assigned+'" data-emergencycontact="'+val.emergency_contact+'" class="btn btn-info btn-sm">Edit</button></td>';
					html += '<td><button id="del'+val.id+'" data-id="'+val.id+'" class="btn btn-danger btn-sm">Delete</button></td>';
				html += '</tr>';
			});

			$('#employeesTbl').html(html);						
		
		}
	});

}

$(function() {

	const baseUrl = 'http://localhost/employees/public/employee';

	getData(baseUrl, true);

	$('.datepicker').datepicker({
		format:'yyyy-mm-dd'
	});

	$('#addEmployeeBtn').click(function(){

		$('#addEmployeeBtn').attr('disabled',true);

		let name = $('#name').val();
		let address = $('#address').val();
		let birthday = $('#birthday').val();
		let age = $('#age').val();
		let contactNo = $('#contactNo').val();
		let emailAddress = $('#emailAddress').val();
		let position = $('#position').val();
		let department = $('#department').val();
		let branch = $('#branch').val();
		let emergencyContact = $('#emergencyContact').val();

		let data = {
			name: name,
			address: address,
			birthday: birthday,
			age: age,
			contactNo: contactNo,
			emailAddress: emailAddress,
			position: position,
			department: department,
			branch: branch,
			emergencyContact: emergencyContact
		}

		$.ajax({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },			
			url: baseUrl+'/add',
			type: 'POST',
			data: data,
			beforeSend: function() {
				$.LoadingOverlay('show');
			},
			success:function(result) {
				$('#addEmployeeBtn').attr('disabled',false);
				$('#addModal').modal('hide');

				let name = $('#name').val('');
				let address = $('#address').val('');
				let birthday = $('#birthday').val('');
				let age = $('#age').val('');
				let contactNo = $('#contactNo').val('');
				let emailAddress = $('#emailAddress').val('');
				let position = $('#position').val('');
				let department = $('#department').val('');
				let branch = $('#branch').val('');
				let emergencyContact = $('#emergencyContact').val('');

				getData(baseUrl, false);
			}
		});

	});

});