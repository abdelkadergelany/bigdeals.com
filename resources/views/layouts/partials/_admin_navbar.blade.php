<nav class="navbar navbar-expand-lg  ">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse" class="btn btn-success">
						<i class="fas fa-align-left"></i>
						<span>Toggle </span>
					</button>
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-align-justify"></i>
					</button>


					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item active">
								<a class="nav-link nav-pages" href="{{url('welcome')}}"><i class="fas fa-home"></i>Home</a>
							</li>
							<li>
								<div class="dropdown show">
									<a class="btn nav-pages" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="far fa-user"></i>
										Account
									</a>

									<div class="dropdown-menu " aria-labelledby="dropdownMenuLink" >
										<a class="dropdown-item" href="#">Edit profile</a>
										<a class="dropdown-item" href={{ __('admin_change_password') }}>Change password</a>
										<a class="dropdown-item" href="{{url('logout')}}">Logout</a>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a class="nav-link nav-pages" href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a>
							</li>

						</ul>
					</div>
				</div>
			</nav>