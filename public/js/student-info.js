$(document).ready(function(){

	function Section({id,department_id,section_name,description,remarks,created_at,updated_at}){
				this.section_id = id;
				this.department_id = department_id;
				this.section_name = section_name;
				this.description = description;
				this.remarks = remarks;
				this.created_at = created_at;
				this.updated_at = updated_at;
	}

	const student = new Vue({
		el:"#student-create",
		name:'student',
		data(){
			return {
			message:"",
			selected_department:'',
			department:'',
			program:'',
			admission:'',
			sections:[],
			departments:[],
			section:'',
			number_of_students:'',
			selected:'',
			section_id:'',
			department_id:'',
			section_name:'',
			description:'',
			remarks:'',
			created_at:'',
			updated_at:'',
			options: [
			      { text: 'One', value: 'A' },
			      { text: 'Two', value: 'B' },
			      { text: 'Three', value: 'C' }
    				],
		}
	},
	mounted:function(){
		$('select').formSelect();
	},
		methods:{

			getSections(){

				window.axios.get("/departments/"+this.department+"/"+this.admission+"/sections").then(({data})=>{
					console.log(data);
					this.sections = data;
					console.log(this.sections);
					this.number_of_students = '';
					this.section = '';
				});
			},
			getNumberOfStudents(){
				$("#preloader").show();
				window.axios.get("/sections/"+this.section+"/students/count").then(({data})=>{
					console.log("Number of Students: "+data);
					// setTimeout(function() {}, 3000);
					this.number_of_students = data;
					$("#preloader").hide();

				});
			},
			getDepartments(){
				window.axios('/programs/'+this.program+"/departments").then(({data})=>{
					console.log(data);
					this.departments = data;
				});
			}
		}
	});


	// $(document).ready(function(){
			$('select').formSelect();
			$(".datepicker").datepicker({format:"yyyy-mm-dd"});
			$('.datepicker#graduation_year').datepicker({format:"yyyy"});
			$('#preloader').hide();
	// });
});