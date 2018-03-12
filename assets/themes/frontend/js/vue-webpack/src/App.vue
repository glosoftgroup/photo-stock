<template>
  <div id="app">
    <div class="choice-plan animatedParent">
	      <!-- page caption -->
        <div class="">
          <div class="caption-top">
            <div class="text-center tagline theme-title" style="padding: 42px 20px 5px;">
              <strong>Find amazing content for your next project</strong>
              <h4 class="caption-subtitle">Search millions of hand-picked images within the application.</h4>
            </div>
          </div>  
        </div>      
        <!-- search -->
        <div class="col-md-6 col-md-offset-3">		
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
                
                            <input v-model="search" @focus="clearCategory" @keyup="inputChangeEvent" style="height: 47px;" type="text" class="form-control" placeholder="Search stock images">
                        
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
    </div>
    <div class="choice-plan2 animatedParent">
        <!-- categories tabs -->
        <div class="col-md-12" v-if="$mq != 'mobile'" >
          <ul class="text-center list-cat-btn">
            <li class="list-item-cat" v-for="(cat, index) in categories" :key="index">
              <a href="javascript:;" @click="setCategory(cat.id)" class="load-more-btn">{{cat.text}}</a>
            </li>
          </ul> 
        </div>               
        <!-- ./categories tabs -->
        <!-- results -->
        <div class="row col-md-12">       
          <!-- cards -->  
          <div class="our-team animatedParent">
          <ul v-if="$mq === 'mobile'">
          <masonry :cols="1" :gutter="30"  >          
          
            <li class="animated bounceInUp delay-250 go" v-for="(item, index) in items" :key="index">
              <span v-if="item.post_id & item.post_id != 'null'">
                <a :href="baseUrl+'stock/art/'+item.post_id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span>
              <span v-else>
                <a :href="baseUrl+'stock/art/'+item.id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span> 
            </li>                    
          </masonry>
          </ul>
          <ul v-if="$mq === 'tablet'">
          <masonry :cols="2" :gutter="30"  >          
          
            <li class="animated bounceInUp delay-250 go" v-for="(item, index) in items" :key="index">
             <span v-if="item.post_id & item.post_id != 'null'">
                <a :href="baseUrl+'stock/art/'+item.post_id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span>
              <span v-else>
                <a :href="baseUrl+'stock/art/'+item.id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span> 
            </li>                    
          </masonry>
          </ul>
          <ul v-if="$mq=='desktop'">
          <masonry :cols="5" :gutter="30"  >          
          
            <li class="animated bounceInUp delay-250 go" v-for="(item, index) in items" :key="index">
              <span v-if="item.post_id & item.post_id != 'null'">
                <a :href="baseUrl+'stock/art/'+item.post_id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span>
              <span v-else>
                <a :href="baseUrl+'stock/art/'+item.id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span>              
            </li>                    
          </masonry>
          </ul>
           <ul v-if="$mq=='laptop'">
          <masonry :cols="5" :gutter="30"  >          
          
            <li class="animated bounceInUp delay-250 go" v-for="(item, index) in items" :key="index">
              <span v-if="item.post_id & item.post_id != 'null'">
                <a :href="baseUrl+'stock/art/'+item.post_id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span>
              <span v-else>
                <a :href="baseUrl+'stock/art/'+item.id">
                 <card :data-image="item.thumbnail">
                    <span slot="header"></span>
                    <p slot="content">{{item.title}}</p>
                 </card> 
                </a>
              </span> 
            </li>                    
          </masonry>
          </ul>
          </div>
          <!-- ./cards -->

        </div>
        <div class="col-md-12 text-center row" v-show="show_loader">
          <button @click="loadMore" class="load-more-btn">
            {{loader}}
          </button>
        </div>
        <!-- /results -->
	   
    </div>
    <!-- /choice plan -->
    <!-- categories card -->
    <div class="container small">
      <div class="our-team animatedParent">
      <h4 class="title-head theme-title" style="padding:12px;color:#e15126;">Be inspired by our curated collections</h4>
      <ul>
        <li class="animated bounceInUp delay-250 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">The Arts</a>
            <span></span>
          </div><!--inside-->
        </li>
        <li class="animated bounceInUp delay-550 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Beauty/Fashion</a>
          </div><!--inside-->
        </li>
        <li @click="setCategory(18)" class="animated bounceInUp delay-750 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Nature</a>
          </div><!--inside-->
        </li>
        <li class="animated bounceInUp delay-1000 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Cultural</a>
          </div><!--inside-->
        </li>
      </ul>
      <ul>
        <li class="animated bounceInUp delay-1000 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Educational</a>
            <span></span>
          </div><!--inside-->
        </li>
        <li class="animated bounceInUp delay-1250 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Food and Drinks</a>
          </div><!--inside-->
        </li>
        <li class="animated bounceInUp delay-1500 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Business/Finance</a>
          </div><!--inside-->
        </li>
        <li class="animated bounceInUp delay-1750 go">
          <img :src="imgUrl+'team-img.png'" alt="team-img">
          <div class="inside">
            <a href="#" class="name">Building/Landmarks</a>
          </div><!--inside-->
        </li>
      </ul>
      </div>
    </div>
    <!-- ./cards -->
  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueMasonry from 'vue-masonry-css'
import VueMq from 'vue-mq'

Vue.use(VueMq, {
  breakpoints: {
    mobile: 450,
    tablet: 900,
    laptop: 1250,
    desktop: Infinity,
  }
})

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
      category:'',
      categories:[],
      queryset:'',
      page_size:20,
      start:20,
      num:20,
      loader:'Discover more..',
      show_loader:false,
      items:[],
      baseUrl:baseUrl,
      imgUrl:imgUrl
    }
  },
  methods:{
    fetchPosts(){
      var self = this;
      this.axios.get(baseUrl+'post/get_list/20')
        .then(function(data) {            
            data = data.data;
            self.items = data.results;
             if(self.items.length > 0){
                self.show_loader = true;
             }                      
        })
        .catch(function(err) {
            console.log(err);
        });
    },
    clearCategory(){
      this.category = '';
    },
    setCategory(id){
      this.category = id;
      this.inputChangeEvent(1);
    },
    inputChangeEvent:function(category_flag=''){
        /* make api request on events filter */
        var self = this;
        this.queryset = 'page_size='+self.page_size;
        this.queryset += '&q='+this.search;
        if(this.category){
          this.queryset += '&category='+this.category;
        }        
        var url = baseUrl+'post/get_list/?';
        if(category_flag==1){
          var url = baseUrl+'post/search/?';
        }        

        this.$http.get(url+self.queryset)
            .then(function(data){
                data = data.data;
                self.items = data.results;
                if(self.items.length > 0){
                  self.show_loader = true;
                }else{
                  self.show_loader = false;
                }                
            }, function(error){
                console.log(error.statusText);
            });
    },
    loadMore(){
      var self = this;
      this.loader = 'Loading ....'
      this.$http.get(baseUrl+'post/load_more/'+self.num+'/'+self.start+'/')
            .then(function(data){
                data = data.data.results;
                if(data.length <=0){
                  self.show_loader = false;                  
                }
                self.loader = 'Load More'
                data.forEach(item => {
                  self.items.push(item);                     
                });                
               }, function(error){
                console.log(error.statusText);
        });
      self.start += self.num;
    },
    loadCategories(){
      var self = this;
      this.$http.get(baseUrl+'post/load_categories')
            .then(function(data){
                data = data.data;
                console.log(data);
                self.categories = data;        
               }, function(error){
                console.log(error.statusText);
        });
    }
  },
  mounted: function(){
    this.fetchPosts();
    this.loadCategories();
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
    background-color: #e15126;
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

.load-more-btn{
  color: #fdfeff;
  font-size: 14px;
  line-height: 24px;
  letter-spacing: 1px;
  padding: 4px 6px 6px 6px;
  border-radius: 5px;
  margin: 0;
  background-color: #e15126;
  transition: 0.5s 0.6s cubic-bezier(0.215, 0.61, 0.355, 1);
  // transition: 5s 1s $returnEasing;
  border: 1px solid transparent;
}


.our-team{
  margin-bottom:0px;
}
.navbar-search{
  margin-bottom: 66px;
}

.form-control:focus {
    border-color: #ea4b1cb3;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(233, 153, 102, 0.6);
}

.theme-title .caption-subtitle
{
  font-size: 20px;
  padding: 11px 6px 3px;
  line-height: 1.4;
}

</style>
