<?php
$uid=Auth::user()->id;
if(Auth::user()->utype!="customer"){
	?>
<script type="text/javascript">
	window.location="{{url('logout')}}";
</script>
	<?php
	exit();
}
?>
<!doctype html>

<html lang="en" id="htmltag" class="<?php
					   if(isset($_COOKIE['theme'])){
						echo   $_COOKIE['theme']; 
					   }
					   ?>">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
  <link rel="icon" href="{{url('vertical/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="{{url('vertical/assets/plugins/notifications/css/lobibox.min.css')}}" />
 
	<link href="{{url('vertical/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{url('vertical/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{url('vertical/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{url('vertical/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{url('vertical/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{url('vertical/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{url('vertical/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('vertical/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
 	<link href="{{url('vertical/assets/css/app.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{url('vertical/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{url('vertical/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{url('vertical/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{url('vertical/assets/css/header-colors.css')}}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  @yield('css')
	<title>@yield('title') </title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
				<!--	<img src="{{url('vertical/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon"> -->
				</div>
				<div>
                  <h4 class="logo-text">Customer</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

        <li>
					<a href="{{url('home')}}" >
						<div class="parent-icon 	active"><i class="bx bx-home-circle"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				     <li>
					<a href="{{url('customer/beneficiary')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">Add beneficiary</div>
					</a>
				</li>
				     <li>
					<a href="{{url('customer/beneficiary/view')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">My beneficiary</div>
					</a>
				</li>
				 <li>
					<a href="{{url('customer/liptm/view')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">My LIPTM</div>
					</a>
				</li>
				 <li>
					<a href="{{url('customer/bedfneficiary/add')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">My Account Statement</div>
					</a>
				</li>
						 <li>
					<a href="{{url('customer/bedfdfneficiary/add')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">My Invoices</div>
					</a>
				</li>
				<li>
					<a href="{{url('customer/bendfdfeficiary/add')}}" >
						<div class="parent-icon "><i class="bx bx-right-arrow-alt"></i>
						</div>
						<div class="menu-title">My Document</div>
					</a>
				</li>
    	
   
				   

		 
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
                          <li>
<!--      <button onclick="window.location='{{url('admin/settings/session')}}'">{{--$session_name--}}</button>
 -->							 <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								 
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<a href="{{url('admin/attendance?r=1%3Fview_policy')}}">
										<div class="col text-center"  >
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Attendence</div>
										</div></a>
						<a href="{{url('admin/stumfee?r=1')}}">

										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-money'></i>
											</div>
											<div class="app-title">Fees</div>
										</div>
									</a>
									<a href="{{url('admin/admitcard?page=1')}}">

										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Admit Card</div>
										</div></a>
								<a href="{{url('admin/sturesult?r=1')}}">

										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Results</div>
										</div></a>
										 
										 
									</div>
								</div>
							</li> 
				 	<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <!--<span class="alert-count">0</span>-->
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
										 
										</div>
									</a>
									<div class="header-notifications-list">
										<!--<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>-->
										 
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">No Notification found</div>
									</a>
								</div>
							</li>
						<li class="nav-item dropdown dropdown-large" style="display:none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									
									<div class="header-message-list">
										 







									</div>
									 
								</div>
							</li> 
						</ul>
					</div>
					<div class="user-box dropdown">
                     
					 	<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
		 

                       <i class='bx bx-user'></i>

 					<div class="user-info ps-3">
								<p class="user-name mb-0">{{Auth::user()->name}}</p>
								
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{url('/admin/profile')}}"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="{{url('user/profile')}}"><i class="bx bx-cog"></i><span>My Account</span></a>
							</li>
							<li><a class="dropdown-item" href="{{url('dashboard')}}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>

							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{url('logout')}}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
	   <div class="page-wrapper"> 
			<div class="page-content"> 
                
        @yield('content')
            
          	</div>
       </div> 
	
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2012-2022 <a href="https://lawatease.com">Law At Ease</a> </p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>

			</div>
			<hr/>
						<!-- <button type="button" class="" onclick="savetheme();" >Save Theme</button> -->

			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between" onclick="savetheme();">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check"  onclick="savetheme();">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors </h6>
			<hr/>
			<div class="header-colors-indigators"  onclick="savetheme();">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators"  onclick="savetheme();">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>

					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
  <!-- Bootstrap JS -->
  <script type="text/javascript">
  	function savetheme() {
  		 htmltag=document.getElementById('htmltag');
  		   
  		   var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
       //alert(xhttp.responseText);
       // alert("Theme chnaged success");
    }
};
xhttp.open("GET", "{{url('api/changetheme/')}}/"+htmltag.className, true);
xhttp.send();
  	}

  </script>
  <script src="{{url('vertical/assets/js/jquery.min.js')}}"></script>

  	<script src="{{url('vertical/assets/js/bootstrap.bundle.min.js')}}"></script>
  	<!--plugins-->
  	<script src="{{url('vertical/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  	<script src="{{url('vertical/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  	<script src="{{url('vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  	<script src="{{url('vertical/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  	<script src="{{url('vertical/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
		<script src="{{url('vertical/assets/plugins/notifications/js/notifications.min.js')}}"></script>
<script src="{{url('vertical/assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
<script src="{{url('vertical/assets/plugins/notifications/js/lobibox.min.js')}}"></script>
	
  
  
  	<script src="{{url('vertical/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{url('vertical/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    
  
  
  	<script src="{{url('vertical/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{url('vertical/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
  
  

  
  

  	<script>
  		$(document).ready(function() {
  			$('#example').DataTable();
  		  } );
  	</script>
  	<script>
  		$(document).ready(function() {
  			var table = $('#example2').DataTable( {
  				lengthChange: false,
  				buttons: [ 'copy', 'excel', 'pdf', 'print']
  			} );

  			table.buttons().container()
  				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
  		} );

  	</script>
  	<!-- Notification Js -->
    <script src="{{url('vertical/assets/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{url('vertical/assets/plugins/notifications/js/notifications.min.js')}}"></script>
    <script src="{{('vertical/assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
  
  	<!--app JS-->
  	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  	<script src="{{url('vertical/assets/js/app.js')}}"></script>
    @yield('script')

</body>

 
</html>
