
  <div class="" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="get" action="{{route('postaddCategory')}}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add a new Ads
                          <img src="{{asset('img/quick.jpg')}}" class="img-rounded" alt="Post and get more clients"></h4>
                     </div><hr><br>
                     <div class="modal-body">
                          <div class="form-group">
                              <label for="category">,<b>Choose a Category First</b>: </label><span style="color: red;">* (select a category)</span>
                               <select id="category" class="selectpicker form-control dynamic" 
                               data-hide-disabled="false" data-live-search="true"   
                               data-dependent="subCategoryName" name="category" required>

                               <option selected  value="">Choose a Category</option>
                    
                                          @foreach ($category as $cat) 
                                           <option>{{"$cat->categoryName"}}</option>
                                          @endforeach
                   
                             </select>
                        </div><br>
                        <div class="form-group">
                           <label for="subCategoryName"><b>Choose a Sub-category</b>: </label>
                            <select id="subCategoryName" class=" form-control" 
                            data-hide-disabled="false" data-live-search="true" name="subCategoryName" required >

                               </select>
                        </div> {{ csrf_field() }}

                      
                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Next"><span class="glyphicon glyphicon-ok-sign" ></span> 
                     </div>
                     </form>
                  </div> 
               </div>
             
            </div>