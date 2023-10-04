<div class="container" style="margin-top: 80px;">
	        <div class="row">
            <div class="col-md-8">
                @if ($errors->any())

    <div class="alert alert-danger">

        <ul class="showerror">

            @foreach ($errors->all() as $error)

                <li class="error">{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
                <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
    <!-- Sign up form -->
    <form action="/submitserviceprovider" method="post" enctype="multipart/form-data">
    	{{csrf_field()}}
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
                <!-- Sex image -->
                <img id="img_sex" class="person-img"
                    src="">
                <h4 id="who_message" class="card-title">Service Provider ?</h4>
                <!-- First row (on medium screen) -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <select id="input_sex" class="form-control" name="gender">
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="first_name" type="text" name="name" class="form-control" placeholder="Full name">
                    </div>
                    <!--div class="form-group col-md-5">
                        <input id="last_name" type="text" name="last_name" class="form-control" placeholder="Last name">
                    </div-->
                    <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile" required>
                        </div>
                </div>
            
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>

                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Pasword</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Type your password" required>

                        </div>
                        <div class="form-group">
                            <label for="password_conf" class="col-form-label">Pasword (confirm)</label>
                            <input type="password" class="form-control" id="password_conf" name="confirm_password" placeholder="Type your password again" required>

                        </div>

                   
                        <div class="form-group">
                            <label for="password" class="col-form-label">Service Provider Type</label>
							  <select class="form-control" id="service_provider_type" name="service_provider_type">
							  	<option>Select Provider Type</option>
							    <option value="Service Professional">Service Proffessional</option>
							    <option value="Organizational">Organizational</option>
							  </select>

                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Service Provider Category</label>
							  <select class="form-control" id="service_provider_category" name="service_provider_category">
							  	@foreach($categories as $key=>$value)
							    <option value="{{$value->subcategory_name}}">{{$value->subcategory_name}}</option>
							    @endforeach
							  </select>
                        </div>
                        <div class="form-group">
                            <label for="password_conf" class="col-form-label">Organization Name:</label>
                            <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Enter Organization Name" required>
                        </div>
                        <div class="form-group">
                                	<label class="lab_felid" for="company_desc">Brief Profile<span class="mandetory_f"> *</span>  <br>(Organization / Professional): </label>
                                    <div class="lang-cnd">	
									<textarea name="company_desc" id="company_desc" rows="8" cols="" style="visibility: hidden; display: none;"></textarea>
                                    <script type="text/javascript">//<![CDATA[
                                    window.CKEDITOR_BASEPATH='https://www.jobability.org/assets/js/ckeditor/';
                                    //]]></script>
                                    <script type="text/javascript" src="https://www.jobability.org/assets/js/ckeditor/ckeditor.js"></script>
                                    <script type="text/javascript">//<![CDATA[
                                    CKEDITOR.replace('company_desc', {"toolbar":[["Source","-","Bold","Italic","Underline","-","Cut","Copy","Paste","PasteText","PasteFromWord","-","Undo","Redo","-","NumberedList","BulletedList","-","Link","Unlink","-","TextColor","Format","Font","FontSize"]],"language":"en","width":"750px","height":"150px","shiftEnterMode":CKEDITOR.ENTER_P,"enterMode":CKEDITOR.ENTER_BR,"autoParagraph":false});
                                    //]]></script>
									
									
								</div>
                                </div>
                                <div class="form-group">
                                	<label for="tel" class="col-form-label">Organization Logo:</label>
                        <input type="file" name="logo" alt="Submit">                            
                        </div>
                                                <div class="form-group">
                            <label for="tel" class="col-form-label">Year of Establishment</label>
                            <input type="text" class="form-control" id="year" name="year_establishment" value="" placeholder="Year" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Country</label>
							  <select class="form-control" id="country" name="country">
                                <option value="0">Select Country</option>
							    @foreach($countries as $key1=>$value1)
                                <option value="{{$value1->id}}">{{$value1->name}}</option>
                                @endforeach
							  </select>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">State / Province</label>
							  <select class="form-control" id="state" name="state">
							  </select>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">District/City</label>
							  <select class="form-control city1" id="city" name="city">
							  </select>
                        </div>

                        <div class="form-group">
                            <label for="tel" class="col-form-label">Zip code/pincode</label>
                            <input type="text" class="form-control" id="tel" placeholder="Enter Zip Code" required>
                        </div>
                                <div style="margin-top: 1em;">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up !</button>
        </div>
                    </div>
                    </div>
                </div>

        </form>
</div>
</div>
</div>