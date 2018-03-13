<template>
  <div id="app">
   <div class="comd-12">
			<div class="">
			  <div class="panel-body">
          <div class="row">
            <!-- body -->
            <div class="col-md-6">
              <!-- title -->
              <div class="form-group col-lg-12">
                <label class="control-label">Title:</label>
                <input class="form-control" v-model="title" name="title" id="title" placeholder="Post Title" type="text">			
              </div>
              <div class="content-group-lg col-md-12">
                <label >Categories:</label>
                <vselect multiple="multiple" id="category" v-model="category" :options="categories">
                  <option disabled value="0">Select Categories</option>
                </vselect> 
              </div>
              <!-- body -->
              <div class="form-group col-lg-12">
                 <label class="control-label">Body:</label>
                <quill-editor :content="body"
                    v-model="body"
                    :options="editorOption"
                  >
                </quill-editor>
              </div>
            </div>
            <!-- sidebar -->
            <div class="col-md-6">
               <!-- upload -->
              <div class="form-group col-lg-12">
                <label>Image:</label>
                <span class="gallery" v-if="full_path">
                  <img class="edit-preview" :src="full_path" alt='Post image'>
                  <span @click="removeImage" class="text-caption btn btn-warning">
                    <i class="icon-cross"></i>
                    Remove
                  </span>
                </span>
                <span :class="show_dropzone">
                  <vue-dropzone @vdropzone-success="vsuccess" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions">
                  </vue-dropzone>
                </span>
                <span class="help-block">Maximum 1 image per post</span>
              </div>
            </div>          
          </div>        

          <!-- submit -->
          <div class="col-md-12">
            <div class="text-right">
						  <button @click="addPost" type="submit" class="btn btn-primary legitRipple">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					  </div>
          </div>
			  </div>
			</div>
   </div>    
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueQuillEditor from 'vue-quill-editor'
import Select2 from "./Select"
import select2 from 'select2'

import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

Vue.use(VueQuillEditor)
Vue.use(VueAxios, axios)
Vue.use('vselect',Select2)
// Vue.use(select2)

export default {
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone,
    vselect:Select2
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      pk:false,
      title:'',
      body:'',
      alert_text:'',
      snackbar:false,
      full_path:'',
      full_size:'',
      show_dropzone:true,
      addUrl:addUrl,
      uploadUrl: uploadUrl,
      category:[],
      list:[],
      post_categories:[],
      categories: [],
      uploadResponse:[],
      editorOption: {
          // some quill options
          headers: { "My-Awesome-Header": "header value" },          
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline', 'strike'],
              ['blockquote', 'code-block'],
              [{ 'header': 1 }, { 'header': 2 }],
              [{ 'list': 'ordered' }, { 'list': 'bullet' }],
              [{ 'script': 'sub' }, { 'script': 'super' }],
              [{ 'indent': '-1' }, { 'indent': '+1' }],
              [{ 'direction': 'rtl' }],
              [{ 'size': ['small', false, 'large', 'huge'] }],
              [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
              [{ 'font': [] }],
              [{ 'color': [] }, { 'background': [] }],
              [{ 'align': [] }],
              ['clean']
            ],
             syntax: {
              highlight: text => hljs.highlightAuto(text).value
            }
          }
      },
      dropzoneOptions: {
          url: uploadUrl,
          thumbnailWidth: 280,
          addRemoveLinks: true,
          maxFiles:1,
          maxFilesize: 19.5,
          headers: { "My-Awesome-Header": "header value" },          
      }
    }
  },
  watch:{
    category: function(val, oldVal){
      // console.log(val);
      // this.list.push(val);
      // console.log(this.list);
      console.log($('#category').val());
    }
  },
  methods:{
    vsuccess(file, response) {
      this.success = true
      try {
         response = JSON.parse(response);
         console.log(response);
         console.log(this.dropzoneOptions.url);
         // this.pk = response.id;
        //  this.dropzoneOptions.url += '/'+this.pk+'/';
        //  console.log(this.dropzoneOptions.url);
      } catch (error) {
        console.log(error);
      }
     
      // window.toastr.success('', 'Event : vdropzone-success')
    },
    removeImage(){
      this.full_path = false;
      this.show_dropzone = '';
    },
    addPost(){
        var self = this;
        // add or update student details if pk is provided
        this.axios.defaults.xsrfHeaderName = "X-CSRFToken"
        this.axios.defaults.xsrfCookieName = 'csrftoken'
        var formData = new FormData();

        formData.append('categories',JSON.stringify($('#category').val()));

        formData.append('title', this.title); 
        formData.append('body', this.body);
        if(pk){
          self.addUrl = baseUrl+'post/add/'+pk+'/';
        }else{
          self.addUrl = baseUrl+'post/add/'
        }
        if(self.pk){
          self.addUrl = baseUrl+'post/add/'+self.pk+'/';
        }
        this.axios.post(self.addUrl, formData)
        .then(function(response) {
            console.log('submited');
            window.location.href = baseUrl+'post/';
            self.alert_text = 'Data updated successfuly';
            self.snackbar = true;            
        })
        .catch(function(err) {
            console.log('error ocursdf');
            console.log(err);
        });
    },
    getPost(){
      var self = this;
      if(pk){
        //this.uploadUrl = baseUrl+'/post/upload_file/'+pk+'/';
        this.show_dropzone = 'hidden';
        // get and edit details
        this.$http.get(baseUrl+'post/get/'+pk+'/')
              .then(function(data){ 
                  data = data.data.results;
                  self.post_categories = data.categories
                  self.title = data.title;
                  self.body = data.body;
                  self.full_path = baseUrl+data.full_path;
                  self.full_size = data.full_size;

                  if(data.categories.length >1){
                    self.post_categories.forEach(item => {
                      self.list.push(item.text);                     
                    });
                    console.log('many cats');
                    $("#category").val(self.list).trigger("change");                     
                  }else{
                    console.log('single cat');
                    console.log(data.categories[0].text);
                    $("#category").val(data.categories[0].text).trigger("change");                     
                  }
                               
              }, function(error){
                  console.log(error.statusText);
              });
      }
    },
    getCategories(){
      var self = this;
      this.$http.get(baseUrl+'post/list_categories/')
              .then(function(data){ 
                data = data.data               
                self.categories = data;                                
              }, function(error){
                console.log(error.statusText);
              });
    }
  },
  mounted:function(){
    this.getCategories(); 
    this.getPost();       
  } // end on mount
}
</script>

<style lang="scss">
$hoverEasing: cubic-bezier(0.23, 1, 0.32, 1);
$returnEasing: cubic-bezier(0.445, 0.05, 0.55, 0.95);

 .edit-preview{
    width: 47%;
    height: auto;
    
  }
  .gallery{
    position: relative;
  }
  .text-caption{
    font-size:13;
    font-weight: bold;
    color: #fff;
    position:absolute;
    left: 16px;
    bottom: -84px;
  }

  .gallery {
    margin: 10px;
    transform: perspective(800px);
    transform-style: preserve-3d;
    // cursor: pointer;
    // background-color: #fff;
    
    &:hover {
      .text-caption {        
        -ms-transform: scale(1.1);
        transform:
          scale(1.1);
        transition:
          0.6s $hoverEasing,
          box-shadow 2s $hoverEasing;
        box-shadow:
          rgba(white, 0.2) 0 0 40px 5px,
          rgba(white, 1) 0 0 0 1px,
          rgba(black, 0.66) 0 30px 60px 0,
         
      }
    }
  }
</style>
