<section class="container-fluid bg-warning1 py-4" id="contactus">

        <div class="container py-5">

            <h3 class="text-dark text-left py-3 display-4 wow fadeInLeft">Post News</h3>

            <div class="row justify-content-center no-gutters py-3">

                <div class="col-12 col-md-10 pt-3 wow fadeInUp">
                    <div class="flash-message">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                      @endforeach
                    </div>
                    <form action="/submitnews" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="sel1">Select Category:</label>
                          <select class="form-control" id="sel1" name="category">
                            <option value="">Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->news_category_name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="sel1">Select State:</label>
                          <select class="form-control" id="states" name="states">
                            <option value="0">State</option>
                            @foreach ($states as $key=>$value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="sel2">Select City:</label>
                          <select class="form-control" id="city" name="city">
                            <option value="0">City</option>
                            <option value="Karnal">Karnal</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Chandigarh">Chandigarh</option>
                          </select>
                        </div>
                
                <div class="form-group has-error">
                    <label for="slug">News Header <span class="require">*</span></label>
                    <input type="file" name="header" />
                </div>
                
                <div class="form-group">
                    <label for="title">Title <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control richcontent" name="description" id="tp"></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    <button class="btn btn-default">
                        Cancel
                    </button>
                </div>
                
            </form>

                </div>


                <div class="col-12 col-md-5 text-dark pl-5 py-2 mt-2">


                    @foreach($news as $key=>$value)
                        <h1>{{$value->news_title}} </h1>
                     <!--img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail"-->
                     
                         <em>This snippet use <a href="" target="_blank"></a></em>
                     <article><p>
                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.  {{$value->news_desc}}   
                         </p></article>
                    @endforeach

                </div>

            </div>

        </div>

    </section>