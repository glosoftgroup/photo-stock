<style type="text/css">
/* nav bar search box - drop down menu button */
.navbar .navbar-search .dropdown-menu { min-width: 55px; }
.dropdown-menu .label-icon { margin-left: 5px; }
.btn-outline {
    background-color: transparent;
    color: inherit;
    transition: all .5s;
}

</style>
<div class="choice-plan animatedParent">
		<div class="container" id="app">
			<h2 class="text-center">Photo Stock</h2>
			<!-- search -->
			<div class="row col-md-6 col-md-offset-3">		
			    <nav class="navbar navbardefault">
			        <div class="nav nav-justified navbar-nav">
			 
			            <form class="navbarform navbar-search" role="search">
			                <div class="input-group">
			                
			                    <div class="input-group-btn">
			                        <button type="button" style="height: 47px;" class="btn btn-search btn-default dropdown-toggle" data-toggle="dropdown">
			                            <span class="glyphicon glyphicon-search"></span>
			                            <span class="label-icon">Search</span>
			                            <span class="caret"></span>
			                        </button>
			                        <ul class="dropdown-menu pull-left" role="menu">
			                           <li>
			                                <a href="javascript:;">
			                                    <span class="fa fa-user"></span>
			                                    <span class="label-icon">Search By User</span>
			                                </a>
			                            </li>
			                            <li>
			                                <a href="javascript:;">
			                                <span class="fa fa-book"></span>
			                                <span class="label-icon">Search By Organization</span>
			                                </a>
			                            </li>
			                        </ul>
			                    </div>
			        
			                    <input style="height: 47px;" type="text" class="form-control">
			                
			                    <div class="input-group-btn">
			                        <button type="button" style="height: 47px;" class="btn btn-search btn-default">
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
			<div class="row">			  
				
			</div>
			<!-- results -->
			
		</div><!--container-->
		<!--===================== Info Plan ========================-->
	
		<!--===================== End of Info Plan ========================-->
	</div>

<?=theme_js('vue-webpack/dist/build.js','frontend');?>
