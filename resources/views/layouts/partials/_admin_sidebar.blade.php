<nav id="sidebar" >
			<div class="sidebar-header ">
				<a href="index.html" ><img src="{{asset('img/logo.png')}}" alt="bigdeal logo"
            class="d-none d-md-inline-block" width="200em"><img src="{{asset('img/logo-small.png')}}" alt="bigdeals.com"
            class="d-inline-block d-md-none " ><span class="sr-only">bigdeals.com</span></a>
			</div>

			<ul class="list-unstyled components">
				<a href="#"><p><i class="fas fa-landmark"></i>&nbsp;Dashboard</p></a>
				<li >
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list-ul"></i>&nbsp;Category</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="{{ route('manageCategories') }}">Manage category</a>
						</li>
						<li>
							<a href="#">Manage sub-category</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-ad"></i>&nbsp;Advertisement</a>
					<ul class="collapse list-unstyled" id="pageSubmenu1">
						<li>
							<a href="#">Manage Adds</a>
						</li>
						<li>
							<a href="#">Add new</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i>&nbsp;Users</a>
					<ul class="collapse list-unstyled" id="pageSubmenu2">
						<li>
							<a href="{{ route('manageUsers') }}">Manage users</a>
						</li>
						<li>
							<a href="#">Add new</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('manageRegions') }}"><i class="fas fa-globe"></i>&nbsp;Manage Regions</a>
				</li>
				<li>
					<a href="{{ route('manageCities') }}"><i class="fas fa-map-marker-alt"></i>&nbsp;Manage City</a>
				</li>
				
				<li>
					<a href="#"><i class="fas fa-envelope"></i>&nbsp;Email</a>
				</li>
		
			</ul>


		</nav>
