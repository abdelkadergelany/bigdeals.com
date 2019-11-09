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
                       <a href="#demo111" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                        class="color_all_categories">&nbsp;&nbsp;VIP</b></a>
                        <div id="demo111" class="collapse">
                           <input  type="radio"  class="vip" id="vip"  name="vip" value="3"><label for="vip"> VIP PRODUCT</label><br>
                           <input  type="radio"  class="vip" id="nvip" name="vip" value="0"><label for="nvip">ALL</label><br>

                       </div>
                       <hr>
                       <a href="#demo14" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                        class="color_all_categories">&nbsp;&nbsp;Condition</b></a>
                        <div id="demo14" class="collapse">
                           <input  type="radio"  class="condition" name="condition" value="new" id="new"><label for="new">New</label><br>
                           <input  type="radio"  class="condition" name="condition" id="used" value="used"><label for="used">Used</label><br>
                           <input  type="radio"  class="condition" name="condition" id="both1" value="both"><label for="both1">Both</label>                                   
                       </div>
                   </form>
                   <hr>
                   <a href="#demo15" class="btn dropdown-toggle color_all_categories" data-toggle="collapse"><b
                    class="color_all_categories">&nbsp;&nbsp;Pricing</b></a>
                    <div id="demo15" class="collapse">
                       <input  type="radio"  class="pricing" name="pricing" value="negociable" id="negociable"><label for="negociable">Negotiable</label><br>
                       <input class="pricing"  type="radio"  name="pricing" value="fixed" id="fixed"><label for="fixed">Fixed</label>
                       <br>
                       <input class="pricing" type="radio"  name="pricing" value="both" id="both2"><label for="both2">Both</label>    
                   </div><br><br>

                   <hr>
