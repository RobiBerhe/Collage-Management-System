<template>
   <div class="">
        <!-- <div class="row"> -->
          <div class="input-field col m3">
            <select name="admission" id="admission" v-model="admission" class="browser-default form-control">
              <option value="" disabled selected>Choose admission</option>
              <option v-for="admission in admissions" v-bind:key="admission.id" v-bind:value="admission.id">{{admission.admission_name}}</option>
            </select>
          </div>
          <div class="input-field col m3">
            <div id="programs">
              <select name="program" id="program" class="browser-default form-control" v-model="program" @change="getDepartments">
                <option value="" disabled selected>Choose program</option>
                <option v-for="program in programs" v-bind:key="program.id" v-bind:value="program.id">{{program.program_name}}</option>
              </select>
            </div>
          </div>
          <div class="input-field col m3">
            <select name="department" id="department" v-model="department" @change="filter" class="browser-default form-control" v-bind:disabled="program == ''">
              <option value="" disabled>Choose Department</option>
              <option v-for="department in departments" v-bind:value="department.id">{{department.department_name}}</option>
            </select>
          </div>
        <!-- </div> -->
        <div class="input-field right">
                      <input type="text" name="search" id="search" v-model="search_q" @keyup="searchStudent">
                      <label for="search">Search by first name</label>
        </div>
        <div class="row" v-if="has_students == false">
            <div class="col m6 offset-m5">
              <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
       <table class="table table-bordered striped highlight table-responsive" id="table-student" v-if="has_students">
           <thead>
           <tr>
               <th onclick="sortTable('table-student',0)">ID</th>
               <th onclick="sortTable('table-student',1)">First Name</th>
               <th onclick="sortTable('table-student',2)">Last Name</th>
               <th onclick="sortTable('table-student',3)">Department</th>
               <th onclick="sortTable('table-student',4)">Program</th>

               <th>Edit</th>
               <th>Delete</th>
           </tr>
           </thead>
           <tbody>
           <tr v-for="student in students" v-bind:key="student.id">
               <td  v-on:click="redirect(student.id)">{{student.id}}</td>
               <td>{{student.application.first_name}}</td>
               <td>{{student.application.last_name}}</td>
               <td>{{student.department.department_name}}</td>
               <td>{{student.program.program_name}}</td>
               <td>
                <a href="/students" class="center waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Edit"><i class="material-icons">edit</i></a>
              </td>
                <td>
                  <a href="#delete-modal" v-on:click="triggerSelected(student.id)" class="center waves-effect waves-light red-text modal-trigger"><i class="material-icons">delete</i></a>
              </td>
           </tr>
           </tbody>
       </table>
       <div id="delete-modal" class="modal">
         <div class="modal-content">
           <h4>Are you sure you ?</h4>
           <p>Are you sure you want to delete the student with an id of {{selected_student}}</p>
         </div>
         <div class="modal-footer">
           <a href="#!" class="btn modal-close waves-effect waves-light grey white-text"><i class="material-icons left">cancel</i>Cancel</a> &nbsp;&nbsp;&nbsp;
           <a href="#!" v-on:click.prevent="deleteStudent(selected_student)" class="btn modal-close waves-effect waves-light red white-text"><i class="material-icons left">delete</i>Yes</a>
         </div>
       </div>
       <div class="row" v-if="has_students">
           <div class="col m6 offset-m4">
                   <ul class="pagination">
                       <li class="page-item"  v-bind:class="{disabled:isInfirstPage}"><a href="#" class="page-link" @click="fetchStudents(pagination.prev)"><</a></li>
                       <li class="page-item" v-bind:class="{active:pagination.current_page === number.num}" v-for="number in pagination.numbers"><a href="#" class="page-link" @click="fetchStudents(number.link)">{{number.num}}</a></li>
                       <li class="page-item" v-bind:class="{disabled:isInLastPage}"><a href="#" class="page-link" @click="fetchStudents(pagination.next)">></a></li>
                   </ul>

           </div>
       </div>
   </div>
</template>

<script>
    export default {
        name:"App",
        data(){
            return {
                students:[],
                programs:[],
                departments:[],
                admissions:[],
                department:'',
                program:'',
                admission:'',
                base_url:'',
                isInfirstPage:'',
                isInLastPage:'',
                pagination:{},
                search_q:'',
                has_students:false,
                selected_student:'',
            }
        },
        created(){
          this.base_url = "/api/students";
            this.fetchStudents(this.base_url);
            this.getAdmissions();
            this.getPrograms();
        },
        methods:{
          triggerSelected(id){
            this.selected_student = id;
          },

            fetchStudents(page_url){
                var vm = this;
                axios.get(page_url).then((res)=>{
                  console.log("Data Retrieved using the Axios");
                  console.log(res);
                  this.students = res.data.data;
                        this.has_students = true;
                        console.log(this.students);
                        vm.makePagination(res.data,this.base_url);
                });
            },
            makePagination(res,base_url){
              base_url = base_url+"?";
                var pagination = {
                    current_page: res.current_page,
                    last_page:base_url+res.last_page,
                    next: (res.next_page_url===null) ?null:base_url+res.next_page_url.substr(1),
                    prev:(res.prev_page_url ===null)?null:base_url+res.prev_page_url.substr(1),
                    numbers:[],
                };
                for(var i=1; i<=res.last_page; i++){
                    pagination.numbers.push({link:base_url+"page="+i,num:i});
                }
                this.pagination = pagination;
                this.isInfirstPage = (res.prev_page_url ===null);
                this.isInLastPage = (res.next_page_url===null);
            },
            searchStudent(){
              if(this.search_q === ""){
                this.base_url = "api/students/"
                this.fetchStudents(this.base_url);
                return;
              } 
              axios.get("students/search/first_name/"+this.search_q).then((data)=>{
                if(data.data !==[]){
                  console.log(data);
                  this.students = [];
                  data.data.forEach((data)=>{
                    const student = this.makeStudent(data);
                    this.students.push(student);
                  });
                }
                else{
                  alert("empty...")
                }

              }).catch((ex)=>{
                console.info("We seem to have problems: "+ex);
                this.base_url = "api/students";
                  this.fetchStudents(this.base_url);
              });
            },
            makeStudent(data){
              const student = {
                'id':data.id,
                'application_id':data.application_id,
                'admission':data.admission,
                'program_id':data.program_id,
                'department_id':data.department_id,
                'section_id':data.section_id,
                'created_at':data.created_at,
                'updated_at':data.updated_at,

                'application':data.application,
                'department':data.department,
                'program':data.program,
              }
              return student;
            },
            deleteStudent(student_id){
              const vm = this;
              axios.delete('/students/'+student_id).then(({data})=>{
                console.log(data);
                this.base_url = "api/students";
                vm.fetchStudents(this.base_url);
              })
            },
            // some of the methods coded below are already available in the students-info.js file, so we should do some refactoring to reuse the methods.
            getPrograms(){
              axios.get("/programs/").then(({data})=>{
                console.log(data);
                this.programs = data;
              });

            },

            getDepartments(){
              this.department = '';
              axios.get('/programs/'+this.program+"/departments").then((res)=>{
                console.log(res.data);
                this.departments = res.data;

              });
            },
            getAdmissions(){
              this.admission = '';
              axios.get('/admissions/').then((res)=>{
                console.log(res.data);
                this.admissions = res.data;
              });
            },

            filter(){
              const filters = { program:this.program,
                                department:this.department,
                                admission:this.admission,
                              }
              console.log("Here are the Filter Values");
              this.fetchFilteredStudents(filters)
            },

            fetchFilteredStudents(filters){
              console.log(filters);
              const vm = this;
              const url = '/students/'+filters.program+'/'+filters.department+'/'+filters.admission;
              axios.get('/students/'+filters.program+'/'+filters.department+'/'+filters.admission)
                    .then((res)=>{
                      console.log("here are the Vaues we found:");
                      console.log(res);
                      vm.students = [];
                      res.data.data.forEach((s)=>{
                          const student = vm.makeStudent(s);
                          vm.students.push(student);
                      });
                      this.program = '';
                      this.department = '';
                      this.admission = '';
                      console.log(res.data.last_page);
                      this.base_url = url;
                      vm.makePagination(res.data,url);
                    })
            },
            // redirects into a single student view.
            redirect(student_id){
              window.location.href ="http://localhost:8000/students/"+student_id;
            },


        }
    }
</script>

<style scoped>

  .table-responsive{
    display: table;
  }

  @media screen and (max-width:600px) {
      .table-responsive {
        display: block;
      }  
  }
  
  select.form-control{
    margin-top: 11px;
    height: auto;
  }
  table tbody> tr >td:nth-child(1) {
    cursor: pointer;
  }

</style>