<template>
  <div id="app">
    <h2 class="text-center">African Stock Images</h2>
			<!-- search -->
			<div class="row col-md-6 col-md-offset-3">		
			    <nav class="navbar navbardefault">
			        <div class="nav nav-justified navbar-nav">
			 
			            <form class="navbarform navbar-search" role="search">
			                <div class="input-group">
			                
			                    <div class="input-group-btn">
			                        <button type="button" style="height: 47px;" class="btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
			                            <!-- search icon -->
			                            <span class="label-icon">Search</span>
			                            <span class="caret"></span>
			                        </button>
			                        
			                    </div>
			        
			                    <input v-model="search" @keyup="inputChangeEvent" style="height: 47px;" type="text" class="form-control">
			                
			                    <div class="input-group-btn">
			                        <button @click="inputChangeEvent" type="button" style="height: 47px;" class="btn btn-search btn-default">
			                        GO
			                        </button>		                         
			                    </div>
			                </div>  
			            </form>   
			         
			        </div>
			    </nav>
			</div>
			<!-- search -->
			<!-- results -->
			<div class="row col-md-12">       
				<!-- cards -->  
        <div class="our-team animatedParent">
        <ul>
        <masonry :cols="5" :gutter="30"  >          
         
          <li class="animated bounceInUp delay-250 go" v-for="(item, index) in items" :key="index">
            <a :href="baseUrl+'stock/art/'+item.id">
            <card :data-image="item.thumbnail">
              <span slot="header"></span>
              <p slot="content">{{item.title}}</p>
            </card> 
            </a>
          </li>                    
        </masonry>
        </ul>
        </div>
        <!-- ./cards -->

			</div>
      <div class="col-md-12 text-center row" v-show="show_loader">
        <button @click="loadMore" class="custom-btn login load-more-btn">
          {{loader}}
        </button>
      </div>
			<!-- results -->
  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueMasonry from 'vue-masonry-css'

Vue.use(VueMasonry);
Vue.use(VueAxios, axios)

Vue.component('card', {
  template: `
    <span class="card-wrap" ref="card">
      <span class="card" :style="cardStyle">      
          <img :src="this.dataImage" alt='Photo-stock'>     
          <div class="card-info">
            <slot name="header"></slot>
            <slot name="content"></slot>
          </div>
      </span>
    </span>`,
  mounted() {
    this.width = this.$refs.card.offsetWidth;
    console.log(this.width)
    this.height = this.$refs.card.offsetHeight;
  },
  props: ['dataImage'],
  data: () => ({
    width: 0,
    height: 0,
    mouseX: 0,
    mouseY: 0,
    mouseLeaveDelay: null
  }),
  computed: {
    mousePX() {
      return this.mouseX / this.width;
    },
    mousePY() {
      return this.mouseY / this.height;
    },
    cardStyle() {
      const rX = this.mousePX * 30;
      const rY = this.mousePY * -30;
      return {
        transform: `rotateY(${rX}deg) rotateX(${rY}deg)`
      };
    },
    cardBgTransform() {
      const tX = this.mousePX * -40;
      const tY = this.mousePY * -40;
      return {
        transform: `translateX(${tX}px) translateY(${tY}px)`
      }
    },
    cardBgImage() {
      return {
        backgroundImage: `url(${this.dataImage})`
      }
    }
  },
  methods: {
    handleMouseMove(e) {
      this.mouseX = e.pageX - this.$refs.card.offsetLeft - this.width/2;
      this.mouseY = e.pageY - this.$refs.card.offsetTop - this.height/2;
    },
    handleMouseEnter() {
      clearTimeout(this.mouseLeaveDelay);
    },
    handleMouseLeave() {
      this.mouseLeaveDelay = setTimeout(()=>{
        this.mouseX = 0;
        this.mouseY = 0;
      }, 1000);
    }
  }
});

export default {
  name: 'app',
  data () {
    return {
      msg: 'Welcome to Photo-stock App',
      search:'',
      status:'',
      page_size:20,
      start:0,
      num:20,
      loader:'Load more..',
      show_loader:true,
      items:[],
      baseUrl:baseUrl
    }
  },
  methods:{
    fetchPosts(){
      var self = this;
      this.axios.get(baseUrl+'post/get_list/20')
        .then(function(data) {            
            data = data.data;
            self.items = data.results;
            console.log('submited');                       
        })
        .catch(function(err) {
            console.log('error ocursdf');
            console.log(err);
        });
    },
    inputChangeEvent:function(){
        /* make api request on events filter */
        var self = this;
        
        this.$http.get(baseUrl+'post/get_list/'+'?page_size='+self.page_size+'&q='+this.search+'&status='+this.status)
            .then(function(data){
                data = data.data;
                self.items = data.results;
                // this.totalPages = precisionRound(parseFloat(data.total_pages),0);                
                
            }, function(error){
                console.log(error.statusText);
        });
    },
    loadMore(){
      var self = this;
      this.loader = 'Loading ....'
      this.$http.get(baseUrl+'post/load_more/'+this.num+'/'+this.start+'/')
            .then(function(data){
                data = data.data.results;
                if(data.length <=0){
                  self.show_loader = false;                  
                }
                self.loader = 'Load More'
                self.items.push({
                              full_path: data[i].full_path,
                              title:data[i].title,
                              body:data[i].body,
                              timestamp:moment(data[i].timestamp).format('YYYY-MM-DD'),                             
                              id:data[i].id
                              });
               }, function(error){
                console.log(error.statusText);
        });
      this.start += this.num;
    }
  },
  mounted: function(){
    this.fetchPosts();
  }
}
</script>

<style lang="scss">
$hoverEasing: cubic-bezier(0.23, 1, 0.32, 1);
$returnEasing: cubic-bezier(0.445, 0.05, 0.55, 0.95);



.title {
  font-family: "Raleway";
  display: block;
  font-size: 14px;
  font-weight: 600;
  line-height: 22px;
  text-align: left;
  word-spacing: 1px;
}

p {
  line-height: 1.5em;
}

h1+p, p+p {
  margin-top: 10px;
}

.card-wrap {
  margin: 10px;
  transform: perspective(800px);
  transform-style: preserve-3d;
  cursor: pointer;
  // background-color: #fff;
  
  &:hover {
    .card-info {
      transform: translateY(0);
    }
    .card-info p {
      opacity: 1;
    }
    .card-info, .card-info p {
      transition: 0.6s $hoverEasing;
    }
    .card-info:after {
      transition: 5s $hoverEasing;
      opacity: 1;
      //transform: translateY(0);
    }
    .card-bg {
      transition: 
        //0.6s $hoverEasing,
        opacity 5s $hoverEasing;
      opacity: 0.8;
    }
    .img {
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
        inset #333 0 0 0 5px,
        inset white 0 0 0 6px;
    }
  }
}

.card {
  position: relative;
  flex: 0 0 332px;
  // width: 332px;
  height: 180px;
  // background-color: #333;
  overflow: hidden;
  
}
.card img{
  // box-shadow: 0 30px 10px 0 rgba(0,0,0,.66),inset 0 0 0 5px #333,inset 0 0 0 6px hsla(0,0%,100%,.5);
  transition: 1s cubic-bezier(.445,.05,.55,.95);
}
.card-bg {
  // opacity: 0.5;
  position: absolute;
  //top: -20px; left: -20px;
  width: 100%;
  height: 100%;
  //margin: 20px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  transition:
    1s $returnEasing,
    opacity 5s 1s $returnEasing;
  pointer-events: none;
}

.card-info {
  padding: 20px;
  position: absolute;
  bottom: 0;
  color: #fff;
  transform: translateY(40%);
  transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
  
  p {
    color: #fdfeff;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 1px;
    padding: 4px 6px 6px 6px;
    border-radius: 5px;
    margin: 0;
    opacity:0;
    background-color: #2b58b3;
    transition: 0.6s 1.6s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  
  * {
    position: relative;
    z-index: 1;
  }
  
  &:after {
    content: '';
    position: absolute;
    top: 0; left: 0;
    z-index: 0;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(to bottom, transparent 0%, rgba(#000, 0.6) 100%);
    background-blend-mode: overlay;
    opacity: 0;
    transform: translateY(100%);
    transition: 5s 1s $returnEasing;
  }
}

.card-info h1 {
  font-family: "Playfair Display";
  font-size: 36px;
  font-weight: 700;
  text-shadow: rgba(black, 0.5) 0 10px 10px;
}

</style>
