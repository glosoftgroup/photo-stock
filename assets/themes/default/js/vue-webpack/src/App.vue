<template>
  <div id="app">
   <div class="col-md-12">
			<div class="panel">
			  <div class="panel-body">
          <!-- upload -->
          <div class="form-group col-lg-12">
            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions">
            </vue-dropzone>
          </div>
          <!-- title -->
          <div class="form-group col-lg-12">
						<label class="control-label">Title:</label>
						<input class="form-control" v-model="title" name="title" id="title" placeholder="Post Title" type="text">			
					</div>

          <!-- body -->
          <div class="form-group col-lg-12">
            <quill-editor :content="body"
                v-model="body"
                :options="editorOption"
               >
            </quill-editor>
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

import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

Vue.use(VueQuillEditor)
Vue.use(VueAxios, axios)

export default {
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',
      title:'',
      body:'',
      alert_text:'',
      snackbar:false,
      editorOption: {
          // some quill options
      },
      dropzoneOptions: {
          url: window.location.origin+'/photo-stock/post/upload_file',
          thumbnailWidth: 150,
          maxFilesize: 0.5,
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
      }
    }
  },
  methods:{
     addPost(){
        var self = this;
        // add or update student details if pk is provided
        this.axios.defaults.xsrfHeaderName = "X-CSRFToken"
        this.axios.defaults.xsrfCookieName = 'csrftoken'
        var formData = new FormData();

        formData.append('title', this.title); 
        formData.append('body', this.body);

        this.axios.post(window.location.href, formData)
        .then(function(response) {
            console.log('submited');
            self.alert_text = 'Data updated successfuly';
            self.snackbar = true;            
        })
        .catch(function(err) {
            console.log('error ocursdf');
            console.log(err);
        });
     }
  }
}
</script>

<style lang="scss">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
