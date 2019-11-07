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
                            
                            <li class="list-inline-item"><a href="{{ route('userRegister') }}">Register</a></li>
                           
                            @endguest

                            @auth
                            <li class="list-inline-item"><a href="{{route('userLogout')}}"  >Logout</a></li>
                            <li class="list-inline-item"><a href="{{route('mychat')}}">My chats 
                               @if(session('newemailUser')=="true")
                              <div class="spinner-grow text-primary"> <i style="color: yellow" class="fas fa-3x fa-comment-medical"></i></div>
                               @endif
                           </a></li>
                           <li class="list-inline-item"><a href="{{route('myAccount')}}">My account</a></li>
                           @endauth


                       </ul>
                   </div>
               </div>
           </div>
  


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
                    <li class="nav-item"><a href="{{route('displayAds')}}?action=allAds" class="nav-link ">Allads</a></li>
                    <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" class="dropdown-toggle nav-link">CATEGORIES<b class="caret"></b></a>
                        <ul class="dropdown-menu megamenu scroller" >
                            <li>
                                <div class="cityname row">

                                 <div class="col-md-3 col-lg-2">
                                    <p>Leisure, Sports and Children</p>
                                    <ul class="list-unstyled mb-3">
                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Leisure, Sports and Children" 
                                            class="nav-link">All in Sport</a></li>
                                            @foreach($cats = getSubCat("Leisure, Sports and Children","subCat") as $cat)

                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>

                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-md-3 col-lg-2">
                                        <p >Automotive</p>
                                        <ul class="list-unstyled mb-3">


                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Automotive" 
                                                class="nav-link">All in automotive</a></li>

                                                @foreach($cats = getSubCat("Automotive","subCat") as $cat)

                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                @endforeach


                                            </div>


                                            <div class="col-md-3 col-lg-2">
                                                <p>Education</p>
                                                <ul class="list-unstyled mb-3">
                                                    <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Education" 
                                                        class="nav-link">All in Education</a></li>


                                                        @foreach($cats = getSubCat("Education","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach


                                                    </ul>
                                                </div>

                                                <div class="col-md-3 col-lg-2">
                                                    <p> Health and Beauty</p>
                                                    <ul class="list-unstyled mb-3">
                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Health and Beauty" 
                                                        class="nav-link">All in Health and Beauty</a></li>


                                                        @foreach($cats = getSubCat("Health and Beauty","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-lg-1">
                                                    <p>Pets</p>
                                                    <ul class="list-unstyled mb-3">
                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Pets" 
                                                        class="nav-link">All in Pets</a></li>


                                                        @foreach($cats = getSubCat("Pets","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-lg-2">
                                                    <p>Mobile Phones</p>
                                                    <ul class="list-unstyled mb-3">
                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Mobile Phones" 
                                                            class="nav-link">All in Mobile Phones</a></li>


                                                            @foreach($cats = getSubCat("Mobile Phones","subCat") as $cat)

                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>


                                                    <div class="col-md-3 col-lg-1">
                                                        <p>Jobs</p>
                                                        <ul class="list-unstyled mb-3">
                                                           <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Jobs" 
                                                            class="nav-link">All in Jobs</a></li>


                                                            @foreach($cats = getSubCat("Jobs","subCat") as $cat)

                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="cityname row">


                                                  <div class="col-md-3  col-lg-2">
                                                    <p>Electronics</p>
                                                    <ul class="list-unstyled mb-3">
                                                       <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Electronics" 
                                                        class="nav-link">All in Electronics</a></li>


                                                        @foreach($cats = getSubCat("Electronics","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>


                                                <div class="col-md-3 col-lg-2">
                                                    <p>House and kitchens</p>
                                                    <ul class="list-unstyled mb-3">
                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=House and kitchens" 
                                                        class="nav-link">All in House and kitchens</a></li>


                                                        @foreach($cats = getSubCat("House and kitchens","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>

                                                <div class="col-md-3 col-lg-2">
                                                    <p>Real estate </p>
                                                    <ul class="list-unstyled mb-3">
                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Real estate" 
                                                        class="nav-link">All in Real estate</a></li>


                                                        @foreach($cats = getSubCat("Real estate","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="col-md-3 col-lg-2">
                                                    <p>Fashion and Clothing</p>
                                                    <ul class="list-unstyled mb-3">
                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Fashion and Clothing" 
                                                        class="nav-link">All in Fashion and Clothing</a></li>


                                                        @foreach($cats = getSubCat("Fashion and Clothing","subCat") as $cat)

                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-lg-2">
                                                    <p>Services</p>
                                                    <ul class="list-unstyled mb-3">
                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Services" 
                                                            class="nav-link">All in Services</a></li>


                                                            @foreach($cats = getSubCat("Services","subCat") as $cat)

                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2">
                                                        <p>Agriculture and Foodstuff</p>
                                                        <ul class="list-unstyled mb-3">
                                                         <li class="nav-item"><a href="{{route('displayAds')}}?action=Cat&type=all&val=Agriculture and Foodstuff" 
                                                            class="nav-link">All in Agriculture and Foodstuff</a></li>


                                                            @foreach($cats = getSubCat("Agriculture and Foodstuff","subCat") as $cat)

                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}" class="nav-link">{{$cat->subCategoryName}}</a></li>
                                                            @endforeach
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
                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=CENTRE" 
                                                                class="nav-link">All in CENTRE</a></li>


                                                                @foreach($cats = getSubCat("CENTRE","city") as $cat)

                                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>




                                                        <div class="col-md-3 col-lg-1">
                                                            <p>North West</p>
                                                            <ul class="list-unstyled mb-3">

                                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=North West" 
                                                                    class="nav-link">All in North West</a></li>


                                                                    @foreach($cats = getSubCat("North West","city") as $cat)

                                                                    <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>

                                                            <div class="col-md-3 col-lg-1">
                                                                <p>Far North</p>
                                                                <ul class="list-unstyled mb-3">

                                                                    <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=Far North" 
                                                                        class="nav-link">All in Far North</a></li>


                                                                        @foreach($cats = getSubCat("Far North","city") as $cat)

                                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-3 col-lg-1">
                                                                    <p>North</p>
                                                                    <ul class="list-unstyled mb-3">
                                                                     <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=North" 
                                                                        class="nav-link">All in North</a></li>


                                                                        @foreach($cats = getSubCat("North","city") as $cat)

                                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-3 col-lg-1">
                                                                    <p>East</p>
                                                                    <ul class="list-unstyled mb-3">
                                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=East" 
                                                                            class="nav-link">All in East</a></li>


                                                                            @foreach($cats = getSubCat("East","city") as $cat)

                                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-md-3 col-lg-1">
                                                                        <p>Littoral</p>
                                                                        <ul class="list-unstyled mb-3">
                                                                           <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=Littoral" 
                                                                            class="nav-link">All in Littoral</a></li>


                                                                            @foreach($cats = getSubCat("Littoral","city") as $cat)

                                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-md-3 col-lg-1">
                                                                        <p>South</p>
                                                                        <ul class="list-unstyled mb-3">
                                                                            <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=South" 
                                                                                class="nav-link">All in South</a></li>


                                                                                @foreach($cats = getSubCat("South","city") as $cat)

                                                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-3 col-lg-1">
                                                                            <p>Adamawa</p>
                                                                            <ul class="list-unstyled mb-3">
                                                                             <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=Adamawa" 
                                                                                class="nav-link">All in Adamawa</a></li>


                                                                                @foreach($cats = getSubCat("Adamawa","city") as $cat)

                                                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-3 col-lg-1">
                                                                            <p>South West</p>
                                                                            <ul class="list-unstyled mb-3">
                                                                                <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=South West" 
                                                                                    class="nav-link">All in South West</a></li>


                                                                                    @foreach($cats = getSubCat("South West","city") as $cat)

                                                                                    <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-3 col-lg-1">
                                                                                <p>West</p>
                                                                                <ul class="list-unstyled mb-3">
                                                                                    <li class="nav-item"><a href="{{route('displayAds')}}?action=Region&type=all&val=West" 
                                                                                        class="nav-link">All in West</a></li>


                                                                                        @foreach($cats = getSubCat("West","city") as $cat)

                                                                                        <li class="nav-item"><a href="{{route('displayAds')}}?action=city&type=one&val={{$cat->cityName}}" class="nav-link">{{$cat->cityName}}</a></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="col-md-3 col-lg-1"></div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </li>
               <!--  <li class="nav-item "><a href="#" class="nav-link">Eng</a>
               </li> -->
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
