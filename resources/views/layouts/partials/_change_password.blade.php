<div class="card bg-light mb-3 " >
	  <div class="card-header">Change Password</div>
	  <div class="card-body">
	     <div class="col-8">
	              <form  method="POST" action="{{url('/admin/admin_change_password')}}">{{csrf_field()}}
	                <div class="control-group">
	                  <label class="control-label" for="current">Current Password</label>
	                  <div class="controls">
	                    <input type="password" class="form-control" name="current" id="pwd" />
	                  </div>
	                </div>
	                <div class="control-group">
	                  <label class="control-label" for="password1">New Password</label>
	                  <div class="controls">
	                    <input type="password"  class="form-control" name="password1" id="pwd1" />
	                  </div>
	                </div>
	                <div class="control-group mb-3">
	                  <label class="control-label" for="password2">Confirm New password</label>
	                  <div class="controls">
	                    <input type="password" class="form-control" name="password2" id="pwd2" />
	                  </div>
	                </div>
	                <div class="form-actions">
	                  <input type="submit" value="update" class="btn btn-success">
	                </div>
	              </form>
	            
	  </div>
	  <div class="card-footer"></div>
	</div>




