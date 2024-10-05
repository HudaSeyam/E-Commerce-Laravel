@extends("layouts._admin")

@section("title", "Create User")

@section("contant")
<form class="form-horizontal w-50"  enctype= "multipart/form-data" method="POST" action="{{ route('users.store') }}">
	 @csrf 
        <div class="form-group"><label for="name" class=" form-control-label">user name</label>
        <input type="text" id="name"  name="name" value="{{ old('name') }}"  class="form-control"></div>
        
        <div class="form-group">
        <label for="email" class=" form-control-label">Email</label>
        <input type="email" id="email" value="{{ old('email') }}" name="email"  class="form-control">
        </div>
        
        <div class="form-group">
        <label for="password" class=" form-control-label">Password</label>
        <input type="password" id="password" value="{{ old('password') }}" name="password"  class="form-control">
        </div>

        <!--div class="form-group m-form__group ">
		<label for="type">type</label>
			<select class="form-control m-input"  name ="type" id="type">
            <option value="admin"> admin</option>  
            <option value="user"> user</option>  
            </select>
	    </div>

        <div class="row form-group">
            <div class="col col-md-3">
            <label for="user_img" class=" form-control-label">image</label></div>
            <div class="col-12 col-md-9">
            <input type="file" id="user_img" name="user_img" class="form-control-file"></div>
        </div>
        
        <div class="form-group">
        <label for="mobile" class=" form-control-label">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"  class="form-control">
        </div>
        <div class="form-group">
        <label for="location" class=" form-control-label">Location</label>
        <input type="text" id="location" name="location" value="{{ old('location') }}"  class="form-control">
        </div-->
        <button type="submit" class="btn btn-success ">create</button>	
</form>                     
@endsection