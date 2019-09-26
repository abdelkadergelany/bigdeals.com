                           <form action="{{ route('filter') }}" method="GET" id="filter">
                            <input type="hidden" name="_token" id="token-messageF" value="{{csrf_token()}}"> 

                            <input type="hidden" name="city" id="cityFilter" value=""> 

                            <input type="hidden" name="subCat" id="subCatFilter" value=""> 
                            <input type="hidden" name="input" id="inputFilter" value=""> 


                            <p><b>Sort By Price:</b></p>
                            <div class="row row_form_allcat">

                                <div class="col-20">
                                    <label for="min">min</label>
                                </div>
                                <div class="col-70">
                                    <input class="inp_all_cat" type="number" min="1" id="min" name="min" placeholder="min">
                                </div>
                            </div>
                            <div class="row row_form_allcat">
                                <div class="col-20">
                                    <label for="max">max</label>
                                </div>
                                <div class="col-70">
                                   <input class="inp_all_cat" type="number" id="max" name="max" min="1" placeholder="max">
                               </div>
                           </div><br>

                           <div class="row row_form_allcat"><br>
                             &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input class=" btn btn-success" type="submit" value="Apply filter">
                         </div>
                         <hr>
                         <a href="#demo14" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                            class="color_all_categories">&nbsp;&nbsp;Condition</b></a>
                            <div id="demo14" class="collapse">
                                New &nbsp;<input  type="radio" id="" class="condition" name="condition" value="new"><br>
                                Used <input  type="radio" id="" class="condition" name="condition" value="used"><br>
                                Both <input  type="radio" id="" class="condition" name="condition" value="both">                                   
                            </div>
                        </form>
                        <hr>
                        <a href="#demo15" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                            class="color_all_categories">&nbsp;&nbsp;Pricing</b></a>
                            <div id="demo15" class="collapse">
                                Negociable <input  type="radio" id="" class="pricing" name="pricing" value="negociable"><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fixed <input class="pricing"  type="radio" id="" name="pricing" value="fixed">
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both <input class="pricing" type="radio" id="" name="pricing" value="both">    
                            </div><br><br>

                            <hr>
                            <a href="#demo16" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                                class="color_all_categories">&nbsp;&nbsp;Brand</b></a>
                                <div id="demo16" class="collapse">
                                    <a class="dropdown-item hover_all_categories" href="#">Customized Desktops</a>
                                    <a class="dropdown-item hover_all_categories" href="#">Intel</a>
                                    <a class="dropdown-item hover_all_categories" href="#">Other Brand</a>
                                    <a class="dropdown-item hover_all_categories" href="#">Dell</a>
                                    <a class="dropdown-item hover_all_categories" href="#">HP</a>
                                    <a class="dropdown-item hover_all_categories" href="#">Acer</a>
                                    <a class="dropdown-item hover_all_categories" href="#">Asus</a>
                                </div>

                                <hr>