// $ = jQuery;
// global functions
function alertUser(msg,status='bg-success',header='Well done!')
    { $.jGrowl(msg,{header: header,theme: status}); }
var parent = new Vue({
    el:"#vue-app",
    delimiters: ['${', '}'],
    data:{
       'name':'account',
       	password:'',
       	email:'',
       	email_error:'',
       	password_error:''
    },
    methods:{
    	validatePassword(){
    		if(this.password.length < 8){
    			this.password_error = 'Passwords must be at least 8 characters long.';
    			return false;
    		}else{
    			this.password_error = '';
    		}
    	},
    	checkEmail(){
    		var self = this;

      		var formData = new FormData();
      		formData.append('user_email', self.email);

      		axios.post(baseUrl+'register/email_exist_pro/', formData)
            .then(function(response) {
            	self.email_error = '';
            	self.password_error = '';
            	self.validatePassword();
            	self.createAccount();
                response = response.data;
                console.log(response);
            })
            .catch(function(err) {
            	self.validatePassword();                
                self.email_error = err.response.data.data;
                return false;
            });

            



    	},
    	createAccount(){
    		var self = this;
      		var formData = new FormData();
      		formData.append('user_email', self.email);
      		formData.append('pass1', self.password);
      		formData.append('pass2', self.password);

      		axios.post(baseUrl+'register/', formData)
            .then(function(response) {
            	this.email_error = '';
            	this.password_error = '';
            	this.password = '';
            	this.email= '';
            	window.location.reload();
                response = response.data;
                console.log(response);
            })
            .catch(function(err) {                
                self.email_error = err.response.data.data;
                return false;
            });

    	}
    },
    mounted:function(){
    	axios.defaults.xsrfHeaderName = "X-CSRFToken"
        axios.defaults.xsrfCookieName = 'csrftoken'
    }
});