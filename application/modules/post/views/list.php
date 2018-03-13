 <style type="text/css">
      .theme_xbox .pace_activity, .theme_xbox .pace_activity::after, .theme_xbox .pace_activity::before, .theme_xbox_sm .pace_activity, .theme_xbox_sm .pace_activity::after, .theme_xbox_sm .pace_activity::before, .theme_xbox_xs .pace_activity, .theme_xbox_xs .pace_activity::after, .theme_xbox_xs .pace_activity::before {
        border-radius: 50%;
        border: 1px solid transparent;
            border-top-width: 1px;
            border-right-width: 1px;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-top-color: transparent;
        border-top-color: #1649fc;
    }
    .pace-demo {
        background-color:#fff;
    }
    @media print {
       #printBtn {
          display: none;
       }
       #addPayment {
          display: none;
       }
       .media-none {
          display: none;
       }
       #media-none {
          display: none;
       }
    }

    .td { cursor:pointer }
   </style>
<script type="text/javascript">
  var base_url = "<?=base_url();?>";
</script>
<div class="content" id="vue-app">
	<div class="row">
		<!-- filter -->
		<div class="col-md-12">
	      <div class="panel panel-flat">

	        <div class="panel-body  search-panel" style="padding:5px;">
	            <div class="col-md-2">
	              <label style="visibility: hidden;"> add</label>
	              <div class="form-group">
	                    <a id="toggle-add-form" href="<?=base_url('post/add');?>" class="btn btn-primary hvr-glow btn-raised legitRipple waves-effect waves-light">
	                        <i class="icon-plus2 position-left"></i>Add
	                    </a>
	              </div>
	            </div>
	            <div class="col-md-4">
	             <label>Search </label>
	              <div class="form-group form-group-material has-feedback">
	                <input class="form-control" v-model="search" @keyup="inputChangeEvent" placeholder="Search ..." type="text">
	                <div class="form-control-feedback">
	                  <i class="icon-search4 text-size-base"></i>
	                </div>
	              </div>
	            </div>
	            <div class="col-md-2 hidden">
	              <div class="form-group">
	                 <label>Status</label>
	                 <select v-model="status" @change="inputChangeEvent" class="bootstrap-select" style="display: none;" data-width="100%" tabindex="-98">
	                    <option value="all" selected>All</option>
	                    <option value="True">Booked</option>
	                    <option value="False">Not Booked</option>
	                  </select>
	              </div>
	            </div>
	            <div class="col-md-2">
	              <label>pick a date</label>
	              <div class="form-group">
	                <div class="input-group">
	                    <span v-datepicker></span>
	                  <input v-model="date" id="date" hello="inputChangeEvent" hi="inputChangeEvent" class="form-control daterange-single" type="text" placeholder="yyyy-mm-dd">
	                  <span class="input-group-addon"><i class="icon-calendar22"></i></span>
	                </div>
	              </div>
	            </div>
	            
	        </div>
		  </div>
		</div>
		<!-- ./filter -->
	</div>

	<!-- listing -->
	<div class="row">

  <div class="col-md-12">
   <div id="pagination-div">
      <!-- Header and footer fixed -->
      <div class="panel panel-flat" id="printme">
        <div class="panel-body">            
        <div class="">
          <table class="table table-sm room-striped room-hover dataroom-header-footer" style="border-bottom:1px solid #ddd;">
                <thead>
                  <tr class="bg-primary">
                    <th>Preview</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Date</th>
                    <th>File info</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="tb">
                <!--loader-->
                <tr v-if="loader" class="text-center">
                    <td colspan="8">
                        <div class="pace-demo">
                            <div class="theme_xbox"><div class="pace_progress" data-progress-text="60%" data-progress="60"></div><div class="pace_activity"></div></div>
                        </div>
                    </td>
                </tr>
                <!--no data template-->
                <template  v-else>
                <tr v-if="items.length == 0" class="text-center">
                    <td colspan="8" class="text-bold animated zoomIn">
                        No Data Found !
                    </td>
                </tr>
                </template>
                <!--listing template-->
                <template v-for="item in items">
                    <tr class="td" :id="item.id">
                        <td>
                            <span v-if="item.full_path">
                              <a :href="base_url+item.full_path" data-popup="lightbox">
                                <img width="120px" :src="base_url+item.full_path" alt="Image">
                              </a>
                            </span>
                            <span v-else>
                                <img width="50" height="50" src="{% static 'images/users/default-avatar.png' %}" alt="Image">
                            </span>
                        </td>
                        <td>
                            ${item.title} 
                        </td>
                        <td>
                          <span v-for="cat in item.categories">
                            <span class="label label-primary" style="margin-right: 5px;">
                            &nbsp;${cat.category_name}&nbsp;
                            </span>
                          </span>
                        </td>
                        <td>
                          ${item.timestamp}
                        </td>
                        <td>
                          ${item.file_size} KB
                        </td>
                        

                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="true">
                                        Actions<span class="caret"></span></button>

                                    <ul class="dropdown-menu-xs dropdown-menu">
                                        <li><a @click="goTo(item.id)" href="javascript:;"><i class="icon-pencil"></i> Edit</a></li>
                                        <li><a @click="deleteInstance(item.id)" href="javascript:;"><i class=" icon-trash-alt"></i> Delete</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                </template>


                </tbody>
           </table>

        </div>
        </div>

         <style type="text/css">
           .pagination{margin-bottom: 0px;}
         </style>
         <div class="row media-none">
         <div class="col-md-12">
          <div class="col-md-4">
           <div class="col-md-12">
            <div class="col-md-6 mt-10">
             <label>display list size</label>
            </div>
            <div class="col-md-6 media-none">
              <div class="form-group">
                 <select v-model="page_size" @change="inputChangeEvent" class="bootstrap-select" style="display: none;" data-width="100%" tabindex="-98">
                    <option value="10" selected>No:</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                  </select>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-4" id="media-none">
              <div class="text-center bootpag-callback p2-pag" style="">
            </div>
           </div>
            <div class="col-md-4">
             <div class="col-md-12 mt-5">
              <div class="pull-right pages-nav"></div>
             </div>
            </div>
          </div>
         </div>
         <input type="hidden" id="page_size" val="">
      </div>
    </div><!-- pagination -->
  </div>
</div>

	<!-- ./listing -->
	<!--delete modal  -->
    <div id="modal_delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title text-center">Confirm Delete</h6>
                </div>

                <div class="modal-body">
                    <h6 class="text-semibold">Are you sure you want to delete ?</h6>
                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button @click="deleteInstance(false)" type="button" class="btn btn-danger animated shake">Delete</button>
                </div>
            </div>
        </div>
    </div>
<!--./delete-->
</div>
<input type="hidden" class="pageUrls"
  data-listurl="<?=base_url('post/get_list');?>"
>
<?=theme_js('plugins/media/fancybox.min.js');?>
<?=theme_js('plugins/forms/selects/bootstrap_select.min.js');?>
<?=theme_js('plugins/pickers/daterangepicker.js');?>
<?=theme_js('plugins/pagination/jquery.twbsPagination.min.js');?>
<?=theme_js('plugins/vue/vue.min.js');?>
<?=theme_js('plugins/vue/axios.min.js');?>
<?=theme_js('plugins/vue/vue-resource.common.js');?>
<?=theme_js('listing.js');?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.bootstrap-select').selectpicker();
     // Lightbox
    $('[data-popup="lightbox"]').fancybox({
        padding: 3
    });
  });
</script>