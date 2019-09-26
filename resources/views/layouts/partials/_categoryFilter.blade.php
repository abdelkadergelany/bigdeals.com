 



<h6><b>All Categories : </b></h6><br>

<a href="#demo1" class="btn dropdown-toggle color_all_categories" data-toggle="collapse">

  <i class="fas fa-mobile"></i> 
  <b class="color_all_categories">&nbsp;&nbsp;Mobile Phones</b></a>
  <div id="demo1" class="collapse" style="text-transform: capitalize !important;">
    @foreach($cats = getSubCat("Mobile Phones","subCat") as $cat)

    <a class="dropdown-item hover_all_categories" 
    href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>

    @endforeach
    
  </div><br>

  <a href="#demo3" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><i class="fas fa-desktop"></i>
    <b class="color_all_categories"> &nbsp;&nbsp;Electronic</b></a>
    <div id="demo3" class="collapse" style="text-transform: capitalize !important;">
      @foreach($cats = getSubCat("Electronics","subCat") as $cat)
      
      <a class="dropdown-item hover_all_categories" 
      href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
      
      @endforeach
    </div><br>

    <a href="#demo2" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
      class="material-icons icons_all_categories fas">&#xf494;</i><b
      class="color_all_categories">&nbsp;&nbsp;House and kitchens</b></a>
      <div id="demo2" class="collapse" style="text-transform: capitalize !important;">
        @foreach($cats = getSubCat("House and kitchens","subCat") as $cat)
        
        <a class="dropdown-item hover_all_categories" 
        href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
        
        @endforeach
      </div><br>

      <a href="#demo4" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
        class="material-icons icons_all_categories fas">&#xf6be;</i><b
        class="color_all_categories">&nbsp;&nbsp;Pets</b></a>
        <div id="demo4" class="collapse" style="text-transform: capitalize !important;">
          @foreach($cats = getSubCat("Pets","subCat") as $cat)
          
          <a class="dropdown-item hover_all_categories" 
          href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
          
          @endforeach
        </div><br>

        <a href="#demo5" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
          class="material-icons icons_all_categories fas">&#xf5de;</i><b
          class="color_all_categories">&nbsp;&nbsp;Automotive</b></a>
          <div id="demo5" class="collapse" style="text-transform: capitalize !important;">
            @foreach($cats = getSubCat("Automotive","subCat") as $cat)
            
            <a class="dropdown-item hover_all_categories" 
            href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
            
            @endforeach
          </div><br>

          <a href="#demo6" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
            class="material-icons icons_all_categories fas">&#xf6f1; </i><b
            class="color_all_categories">&nbsp;&nbsp;Real estate</b></a>
            <div id="demo6" class="collapse" style="text-transform: capitalize !important;">
              @foreach($cats = getSubCat("Real estate","subCat") as $cat)
              
              <a class="dropdown-item hover_all_categories" 
              href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
              
              @endforeach
            </div><br>

            <a href="#demo7" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
              class="material-icons icons_all_categories fas">&#xf756;</i><b
              class="color_all_categories">&nbsp;&nbsp;Health &amp; Beauty</b></a>
              <div id="demo7" class="collapse" style="text-transform: capitalize !important;">
               @foreach($cats = getSubCat("HEALTH AND BEAUTY","subCat") as $cat)
               
               <a class="dropdown-item hover_all_categories" 
               href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
               
               @endforeach
             </div><br>

             <a href="#demo8" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
              class="material-icons icons_all_categories fas">&#xf1e3;</i><b
              class="color_all_categories">&nbsp;&nbsp;Leisure, Sports &amp; Children</b></a>
              <div id="demo8" class="collapse" style="text-transform: capitalize !important;">
                @foreach($cats = getSubCat("LEISURE, SPORTS AND CHILDREN","subCat") as $cat)
                
                <a class="dropdown-item hover_all_categories" 
                href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                
                @endforeach
              </div><br>

              <a href="#demo9" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i
                class="material-icons icons_all_categories fas">&#xf6e3; </i><b
                class="color_all_categories">&nbsp;&nbsp;Services</b></a>
                <div id="demo9" class="collapse" style="text-transform: capitalize !important;">
                  @foreach($cats = getSubCat("Services","subCat") as $cat)
                  
                  <a class="dropdown-item hover_all_categories" 
                  href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                  
                  @endforeach
                </div><br>

                <a href="#demo10" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><i class="fas fa-briefcase"></i>
                  <b  class="color_all_categories">&nbsp;&nbsp;Jobs</b></a>
                  <div id="demo10" class="collapse" style="text-transform: capitalize !important;">
                    @foreach($cats = getSubCat("Jobs","subCat") as $cat)
                    
                    <a class="dropdown-item hover_all_categories" 
                    href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                    
                    @endforeach
                  </div><br>

                  <a href="#demo11" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i class="fas fa-book-reader"></i>
                    <b  class="color_all_categories">&nbsp;&nbsp;Education</b></a>
                    <div id="demo11" class="collapse" style="text-transform: capitalize !important;">
                      @foreach($cats = getSubCat("Education","subCat") as $cat)
                      
                      <a class="dropdown-item hover_all_categories" 
                      href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                      
                      @endforeach
                    </div><br>

                    <a href="#demo12" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i class="fas fa-tractor"></i>
                      <b class="color_all_categories">&nbsp;&nbsp;Agriculture and Foodstuff</b></a>
                      <div id="demo12" class="collapse" style="text-transform: capitalize !important;">
                       @foreach($cats = getSubCat("Agriculture and Foodstuff","subCat") as $cat)
                       
                       <a class="dropdown-item hover_all_categories" 
                       href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                       
                       @endforeach
                     </div><br>

                     <a href="#demo13" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"> <i class="fas fa-tshirt"></i>
                      <b class="color_all_categories">&nbsp;&nbsp;Fashion and Clothing</b></a>
                      <div id="demo13" class="collapse" style="text-transform: capitalize !important;">
                       @foreach($cats = getSubCat("Fashion and Clothing","subCat") as $cat)
                       
                       <a class="dropdown-item hover_all_categories" 
                       href="{{route('displayAds')}}?action=subCat&type=one&val={{$cat->subCategoryName}}">{{$cat->subCategoryName}}</a>
                       
                       @endforeach
                     </div><br><br>