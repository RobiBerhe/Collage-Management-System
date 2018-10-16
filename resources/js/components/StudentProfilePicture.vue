<template>
	<div class="col m12">
		<div class="row">
			<!-- <p>Student id is : {{stid}}</p> -->
			<form action="/profile/picture/upload" method="POST" enctype="multipart/form-data" v-on:submit.prevent="upload">
				<div class="col m12">
						<div v-if="picture">
							<img v-bind:src="picture" alt="student picture" data-position="top" data-tooltip="Click here to view a larger version of this image" class="img-fluid tooltipped"  v-on:click="lightbox">
							<div class="lightbox" id="lightbox">
								<div class="light-img">
									<img v-bind:src="picture" alt="student profile picture" class="img-fluid">
									<a class="btn btn-lg btn-flat red darken-3 white-text light-cancel" href="#" v-on:click.prevent="cancelLightbox">&times;</a>
								</div>
							</div>
						</div>
						<div v-else>
							<img src="/images/user-avatar.png" alt="" data-position="bottom" data-tooltip="Click here to upload/change" class="img-fluid tooltipped" onclick="document.getElementById('picture').click()">
						</div>
						<div class="row"></div>
						<input type="file" name="photo" id="picture" class="form-control">

				</div>
				<div class="row"></div>
				<div class="col m1 offset-m3">
						<button v-if="picture" class="btn waves-effect waves-light red darken-2" type="submit">Change</button>
						<button v-else class="btn waves-effect waves-light red darken-2" type="submit">Upload</button>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	export default {
		name:'StudentProfile',
		data(){
			return {
				message:'loaded the profile picture component...',
				picture:'',
				studentId:this.stid,
			}
		},
		props:{
			stid:'',
		},
		created(){
			axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr("content")
			console.log($('meta[name="csrf-token"]').attr("content"));
			this.loadStudentPicture();
		},

		methods:{
			loadStudentPicture(){
				axios.get('/profile/picture/'+this.studentId)
					 .then((res)=>{
					 	this.picture = res.data;
					 	console.log(this.picture);
					 });
			},

			upload(){
				let csrf = $('meta[name="csrf-token"]').attr("content");
				const file = document.querySelector("#picture");
				let formData = new FormData();
				formData.append('_token',csrf);
				formData.append('photo',file.files[0]);
				console.log("We are uploading picture for student with an id of: "+this.studentId);
				axios.post('/profile/picture/upload/'+this.studentId,formData)
					.then((res)=>{
						this.picture = res.data;
						console.log(this.picture);
					})
			},

			lightbox(){
				$("#lightbox").fadeIn();
			},

			cancelLightbox(){
				$("#lightbox").fadeOut();
			}

		}

	}
</script>