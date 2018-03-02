<style >
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.thumbnail img{
  width: 150px; height: auto;
  margin: auto;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
.fileinput-exists .thumbnail{
  max-width: 200px; max-height: 150px;
}
.application--wrap{
  min-height: auto;
}
.application.theme--light{
  background: #fff;
  margin-top: 16px;
}
.input-group--text-field input, .input-group--text-field textarea {
    font-size: 13px;
}
</style>

<div class="content" id="vue-app">
	<div class="row">
		<!-- post form -->
		<div class='alert alert-danger'>
			<?php echo validation_errors(); ?>
		</div>
		<?php echo form_open('post/add') ?>
		<!--  -->
		<div class="col-md-12">
			<div class="panel">
			  <div class="panel-body">
				<!-- image -->
		          <div class="col-md-3">
		            <div class="form-group">     
		                <div class="fileinput fileinput-new" data-provides="fileinput">
		                  <div class="fileinput-new thumbnail text-center" >
		                    <h6 class="text-center">Upload Image</h6>                   
		                    <span v-if="imageData.length > 0">
		                    <img data-src="holder.js/100%x100%" alt="..." :src="imageData">
		                    </span>
		                    <span v-else>
		                    <img data-src="holder.js/100%x100%" alt="..." :src="default_imageData">
		                    </span>
		                  </div>
		                 <div style="text-align: center;">
		                    <span class="btn btn-warning btn-file">
		                      <span class="fileinput-new"></span>
		                      <span class="fileinput-exists">Upload</span>
		                      <input type="file" @change="previewImage" name="image" id="image">
		                    </span>
		                    <a  v-if="imageData.length > 0" href="javascript:;" class="btn btn-default fileinput-exists" data-dismiss="fileinput" @click="removePreviewImage">Remove</a>
		                  </div>
		                </div>
		              </div>
		          </div>
		        <!-- ./image -->
		      </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title hidden">Add New Post<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		
	                	</ul>
                	</div>
				</div>

				<div class="panel-body">
					<div class="form-group col-lg-12">
						<label class="control-label">Title:</label>
						<input class="form-control" name="title" id="title" placeholder="Post Title" type="text">
						
					</div>

					<div class="form-group">
						<tinymce id="editor" v-model="editor" :options="options" @change="change" :content='content'></tinymce>
					</div>
					<div class="form-group">
						<label class="col-lg-3 control-label">Content:</label>
						<div class="col-lg-9">
							<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary legitRipple">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?=theme_js('plugins/vue/vue.min.js');?>
<?=theme_js('plugins/vue/vue-tinymce.min.js');?>

<script type="text/javascript">
	Vue.use(VueTinymce)
	new Vue({
		el: '#vue-app',
		data:{
			options:[],
			content:'',
			editor:'',
			default_imageData: "/static/images/users/default-avatar.png",
			imageData:'',
		},
		methods:{
			change(){
				console.log('sdfsf');
			},
			removePreviewImage: function(){
		       this.imageData = '';
		    },
			previewImage: function(event) {
	        // Reference to the DOM input element
	        var input = event.target;
	        // Ensure that you have a file before attempting to read it
	        if (input.files && input.files[0]) {
	            // create a new FileReader to read this image and convert to base64 format
	            var reader = new FileReader();
	            // Define a callback function to run, when FileReader finishes its job
	            reader.onload = (e) => {
	                // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
	                // Read image as base64 and set to imageData
	                this.imageData = e.target.result;
	            }
	            // Start the reader job - read file as a data url (base64 format)
	            reader.readAsDataURL(input.files[0]);
	        }
	      }
		}
	})
</script>
