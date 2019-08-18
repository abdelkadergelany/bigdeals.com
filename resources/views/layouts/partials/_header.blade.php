    <header class="header mb-5">

        <div id="top" style="background: url(img/back.jpg)">
        <div class="container">
            <div class="row">
            <div class="col-lg-6 slogan mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">buy and sell here</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <ul class="menu list-inline mb-0">

                    @guest
                <li class="list-inline-item"><a href="{{ route('userLogin') }}"  >Login</a></li>
                <li class="list-inline-item"><a href="{{route('mychat')}}">My chats</a></li>
                <li class="list-inline-item"><a href="{{ route('userRegister') }}">Register</a></li>
                <li class="list-inline-item"><a href="{{route('myAccount')}}">My account</a></li>
                   @endguest

                   @auth
                   <li class="list-inline-item"><a href="{{route('userLogout')}}"  >Logout</a></li>
                   <li class="list-inline-item"><a href="{{route('mychat')}}">My chats</a></li>
                   <li class="list-inline-item"><a href="{{route('myAccount')}}">My account</a></li>
                   @endauth
                

                </ul>
            </div>
            </div>
        </div>
      <!--   <div id="login-modal" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #512DA8">
                <h5 class="modal-title ">LOGIN</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                    aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                
                <form method="POST" action="{{url('userLogin')}}">{{csrf_field()}}
                    <div class="form-group">
                    <input id="email-modal" name="email" type="email" placeholder="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <input id="password-modal" name="password" type="password" placeholder="password" class="form-control">
                    </div>
                    <p class="text-center">
                    <button name="" class="btn btn-primary" style="background-color: #512DA8"> SignIn</button>
                    </p>
                </form>
                <p class="text-center text-muted"><a href="#" data-toggle="modal" data-target="#login-password">Forgot
                    password?</a></p>
                <p class="text-center ">Not yet registered? <a href="{{ route('userRegister') }}"><strong>Create </strong></a>your
                    account now</p>
                </div>
            </div>
            </div>
        </div> -->
      <!--   <div id="login-password" role="dialog" aria-labelledby="Reset Password" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title ">Reset Password</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                    aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                    <label for="email-modal">enter your email</label>
                    <div class="form-group">
                    <input id="" type="text" placeholder="email" class="form-control">
                    </div>

                    <p class="text-center">
                    <button name="" class="btn btn-primary" style="background-color: #512DA8"> Sent</button>
                    </p>
                </form>
                <p class="text-center text-muted"><a href="#" data-toggle="modal" data-target="#login-password">Forgot
                    password?</a></p>
                <p class="text-center ">Don't worry, we can send it again! </p><br><br>
                </div>
            </div>
            </div>
        </div> -->


        </div>


        <!-- our mega menu start here -->


        <nav class="navbar navbar-expand-lg" style="background-color: #512DA8;padding-bottom: 0rem; padding-top: 0rem; ">
        <div class="container"><a href="/" class="navbar-brand home"><img src="img/logo.png" alt="Sassaye logo"
                class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="bigdeals.com"
                class="d-inline-block d-md-none " width="100px"><span class="sr-only">bigdeals.com</span></a>
            <div class="navbar-buttons">

            <button type="button" data-toggle="collapse" data-target="#navigation"
                class="btn btn-outline-secondary navbar-toggler" style="color: white"><span class="sr-only">Toggle
                navigation</span><i class="fa fa-align-justify"></i></button>

            </div>
            <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto" >
                <li class="nav-item"><a href="#" class="nav-link ">Alladds</a></li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown"
                    data-delay="200" class="dropdown-toggle nav-link">CATEGORIES<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu scroller" >
                    <li>
                    <div class="cityname row">

                       <div class="col-md-3 col-lg-2">
                        <p>Leisure, Sports and Shildren</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Sporting</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Sport And Fitness</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Outdoors</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">SportSwear</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Sport Shoes</a></li>
                        </ul>
                        </div>
                        
                        <div class="col-md-3 col-lg-2">
                        <p >Automotive</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All in automotive</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Car</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Trucks, vans and buses</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Motorcycles and Bicycles</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Spare parts for motorcycles</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Vehicles rental</a></li>
                        </ul>
                        </div>
                       
                        
                        <div class="col-md-3 col-lg-2">
                        <p>Education</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All For Education</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tuition</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Study Abroad</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Textbooks</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Courses</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Other Education</a></li>
                        </ul>
                        </div>

                        <div class="col-md-3 col-lg-2">
                        <p> Health and Beauty</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Health and Beauty</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Perfumes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">MakeUp</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Beauty And Personnal Care</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Men Beauty</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Best Brands</a></li>
                        </ul>
                        </div>
                         <div class="col-md-3 col-lg-1">
                        <p>Pets</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Pets</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Fish and Aquatic Pets</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Dogs</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Cats</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-2">
                        <p>Mobile Phones</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">Everything in mobile telephony </a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Smartphones</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tablets</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Phone Accessories</a></li>
                        </ul>
                        </div>


                       <div class="col-md-3 col-lg-1">
                        <p>Jobs</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Jobs</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Industry</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Business Function</a></li>
                        </ul>
                        </div>
                    </div>
                    <div class="cityname row">

                        
                          <div class="col-md-3  col-lg-2">
                        <p>Electronics</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">Everything in electronics</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Laptop and Desktop</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Computer Accessories</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Cameras, Camcorders and Accessories</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">TVs and Accessories</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Audio and Sound Systems</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Video Game Consoles and Accessories</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Other electronic equipment</a></li>

                        </ul>
                        </div>
                       
                       
                          <div class="col-md-3 col-lg-2">
                        <p>House and kitchens</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All For House and kitchen</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">ACs And Home Electronics</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Living Room Furniture</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bedroom Furniture</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Home Appliances</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Home Textiles And Decoration</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Office And Shop Furniture</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Household Items</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kitchen And Dining Furniture</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Children's Furniture</a></li>
                        
                        </ul>
                        </div>
                        
                          <div class="col-md-3 col-lg-2">
                        <p>Real estate </p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All in real estate</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Houses for sale</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Houses for rent</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Studios and Rooms for rent</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Apartments for sale</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Apartments for rent</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Land and plots for sale</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Land and plots for rent</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Commercial Premises and Offices</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Industrial premises</a></li>
                        </ul>
                        </div>
                       
                        <div class="col-md-3 col-lg-2">
                        <p>Fashion and Clothing</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All in Fashion and Clothing</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Men's clothes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Men's Shoes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Women's Clothing</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Women's shoes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kids clothing</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bags and Luggage</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Jewelry and Watches</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Fashion Accessories</a></li>
                        </ul>
                        </div>
                         <div class="col-md-3 col-lg-2">
                        <p>Services</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All For Services</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Travel And Visa</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Business And Technical Services</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tickets</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Events And Hospitality</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Health And Lifestyle</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Domestic And Personal</a></li>
                        </ul>
                        </div>
                         <div class="col-md-3 col-lg-2">
                        <p>Agriculture and Foodstuff</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All For Agriculture and Food</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Food</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Crops, Seeds And Plants</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Farming Tools And Machinery</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Other Food And Agriculture</a></li>
                        </ul>
                        </div>
                    

                    </div>
                    </li>
                </ul>
                </li>


                <li class="nav-item dropdown menu-large "><a href="#" data-toggle="dropdown" data-hover="dropdown"
                    data-delay="200" class="dropdown-toggle nav-link">CITY<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu scroller">
                    <li>
                    <div class="cityname row">
                        <div class="col-md-3 col-lg-1"></div>
                        <div class="col-md-3  col-lg-1">
                        <p>CENTRE</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All the center</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Akonolinga</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bafia</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Eseka</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mbalmayo</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mfou</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Monatele</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Nanga-Eboko</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ngoumou</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ntui</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Yaounde</a></li>
                        </ul>
                        </div>
                       
                        <div class="col-md-3 col-lg-1">
                        <p>West</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All the West</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bafang</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bafoussam</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Baham</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bandjoun</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bangangte</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Dschang</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Foumban</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Foumbot</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">Koutaba</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mbouda</a></li>
                        </ul>
                        </div>
                       

                        <div class="col-md-3 col-lg-1">
                        <p>North West</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All North West</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bamenda</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Fundong</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kumbo</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mbengwi</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ndop</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Nkambe</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Wum</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-1">
                        <p>Far North</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All the Far North</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kaele</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kousseri</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Maroua</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mokolo</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mora</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Yagoua</a></li>
                        </ul>
                        </div>
                         <div class="col-md-3 col-lg-1">
                        <p>South West</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All South West</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bangem</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kumba</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Limbe</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mamfe</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Menji</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mundemba</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-1">
                        <p>North</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All the North</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Garoua</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Guider</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Poli</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tchollire</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-1">
                        <p>East</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All East</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Abong-Mbang</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Batouri</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Bertoua</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Yokadouma</a></li>
                        </ul>
                            </div>
                        <div class="col-md-3 col-lg-1">
                        <p>Adamawa</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Adamawa</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Banyo</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Meiganga</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ngaoundere</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tibati</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Tignere</a></li>
                        </ul>
                        </div>
                         <div class="col-md-3 col-lg-1">
                        <p>Littoral</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All Littoral</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Douala</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Edea</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Nkongsamba</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Yabassi</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-1">
                        <p>South</p>
                        <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="#" class="nav-link">All the South</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ambam</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Ebolowa</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kribi</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Sangmelima</a></li>
                        </ul>
                        </div>
                        <div class="col-md-3 col-lg-1"></div>
                    </div>
                    </li>
                </ul>
                </li>
                <li class="nav-item "><a href="#" class="nav-link">Eng</a>
                </li>
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">


                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">

                    <a href=" {{ route('postadd')}}" class="btn btn-success btn-lg navbar-btn"><i class="fa fa-tag"></i>
                        <span>Post add</span></a></div>
            </div>
            </div>
        </div>
        </nav>

    </header>
