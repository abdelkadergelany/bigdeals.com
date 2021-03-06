<nav id="sidebar" >
			<div class="sidebar-header ">
				<a href="{{route('welcome')}}" ><img src="{{asset('img/logo.png')}}" alt="bigdeal logo"
            class="d-none d-md-inline-block" width="200em"><img src="{{asset('img/logo-small.png')}}" alt="bigdeals.com"
            class="d-inline-block d-md-none " ><span class="sr-only">bigdeals.com</span></a>
			</div>

			<ul class="list-unstyled components">
				<a href="{{route('dashboard')}}"><p><i class="fas fa-landmark"></i>&nbsp;Dashboard</p></a>
				<li >
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-list-ul"></i>&nbsp;Category</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="{{ route('manageCategories') }}">Manage category</a>
						</li>
						<li>
							<a href="{{ route('manageSubCategory') }}">Manage sub-category</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-ad"></i>&nbsp;Advertisement</a>
					<ul class="collapse list-unstyled" id="pageSubmenu1">
						<li>
							<a href="{{ route('manageAds') }}">Manage Ads</a>
						</li>
						<li>
							<a href="{{ route('addNewAd') }}">Add new</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{route('allorders')}}"><i class="fas fa-shopping-cart"></i>&nbsp;Manage Orders</a>
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
					<a href="#pageSubmenu111" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-ad"></i>&nbsp;Brands</a>
					<ul class="collapse list-unstyled" id="pageSubmenu111">
						<li>
							<a href="{{ route('manageBrand') }}?action=displayBrand">Manage Brands</a>
						</li>
						<li>
							<a href="{{ route('manageBrand') }}?action=displayModel">Manage Models</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="{{route('readMail')}}"><i class="fas fa-envelope"></i>&nbsp;Email 
                        @if(session('newemail')=="true")
						<div class="spinner-grow text-primary"> <i style="color: yellow" class="fas  fa-comment-medical"></i></div>
						@endif
					</a>
				</li>
		
			</ul>


		</nav>
