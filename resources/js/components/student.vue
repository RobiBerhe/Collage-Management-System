<template>
	<div class="row">
								<div class="row">
									<div class="input-field col m6">
										<input type="text" class="datepicker" id="date_of_admission" name="date_of_admission">
										<label for="date_of_admission">Date of Admission</label>
									</div>
									<div class="input-field col m6">
										<input type="text" name="graduation_year" id="graduation_year" class="datepicker">
										<label for="graduation_year">Graduation Year</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col m6">
										<select name="admission" id="admission">
											<option value="" disabled selected>Choose Admission</option>
											<option value="Regular">Regular</option>
											<option value="Extension">Extension</option>
										</select>
										<label>Admission</label>
									</div>
									<div class="input-field col m6">
										{{message}}
										<select name="department" id="department"  v-model="department">
											<option value="" disabled>Choose a department</option>
											<option v-for="(department,index) in departments" v-bind:key="index" v-bind:value="department.id">{{department.department_name}}</option>
			</select>
			<label>Department</label>
			{{selected_department}}
		</div>
	</div>
</div>
</template>

<script>
	export default {
		name:"App",
		data(){
			return {
				selected_department:'',
				departments:[],
				// departments:[{id:'1',department_name:'AIS'},{id:'2',department_name:'MIS'},{id:'3',department_name:'SW'}],
				department_id:'', // this is an id of a department.
				name:'', // this is a name of a department.
				sections:[], // this is a departments collection of sections.
				message:'Hello (:)',
				department:'',
			}
		},
		created(){
			this.getDepartments();
		},
		methods:{
			getDepartments(){
				fetch("api/departments")
					.then(res=>res.json())
					.then(res=>{
						console.log(res);
						this.departments = res;
						console.log(this.departments);
						console.log(this.departments[0].department_name);
					});
			}
		}

	}

</script>