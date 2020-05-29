
const baseUrl = 'http://localhost/employees/public/employee';

Vue.component('employees',{
	props: {
		employee: Object
	},
	template:`
		<tr>
			<td>{{ employee.name }}</td>
			<td>{{ employee.address }}</td>
			<td>{{ employee.birthday }}</td>
			<td>{{ employee.age }}</td>
			<td>{{ employee.contact_number }}</td>
			<td>{{ employee.email_address }}</td>
			<td>{{ employee.position }}</td>
			<td>{{ employee.department }}</td>
			<td>{{ employee.branch_assigned }}</td>
			<td>{{ employee.emergency_contact }}</td>
			<td><button class="btn-info btn-sm">Edit</button></td>
			<td><button class="btn-danger btn-sm">Del</button></td>
		</tr>
	`
});

new Vue({
	el:'.container',
	data: function() {
		return {
			employees: [],
			name: '',
			address: '',
			birthday: '',
			age: '',
			contactNo: '',
			emailAddress: '',
			position: '',
			department: '',
			branch: '',
			emergencyContact: ''
		}
	},
	created() {
		this.show();
	},
	methods: {
		show: function() {

			$.LoadingOverlay('show');

			axios.get(`${baseUrl}/show`)
			.then((response) => {
				
				this.employees = this.employees.concat(response.data);
				$.LoadingOverlay('hide');
			})
			.catch((error) => {

				console.log('error');
			})
		},
		add: function() {
			
			$.LoadingOverlay('show');

			let data = {
				name: this.name,
				address: this.address,
				birthday: this.birthday,
				age: this.age,
				contactNo: this.contactNo,
				emailAddress: this.emailAddress,
				position: this.position,
				department: this.department,
				branch: this.branch,
				emergencyContact: this.emergencyContact
			};

			console.log(data);			

			axios.post(`${baseUrl}/add`, data)
			.then((response) => {

				this.name = '';
				this.address = '';
				this.birthday = '';
				this.age = '';
				this.contactNo = '';
				this.emailAddress = '';
				this.position = '';
				this.department = '';
				this.branch = '';
				this.emergencyContact = '';

				$.LoadingOverlay('hide');

			})
			.catch((error) => {

				console.log('error');
			});
		}
	}
});