@extends('layouts.master')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="/services">Services</a></li>
  </ol>

</nav>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Book this services.
                </div>
                <div class="card-body">
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
                    <form action="/bookservice" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="service_id" value="{{$serviceprovider->id}}">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Mobile No.</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Enter Mobile No." required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your mobile no with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Home Phone</label>
                            <input type="text" class="form-control" id="home_phone" name="home_phone" aria-describedby="emailHelp" placeholder="Enter Home Phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Address (Primary)</label>
                            <input type="text" class="form-control" id="address_primary" name="address_primary" aria-describedby="emailHelp" placeholder="Enter Primary Address" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Address (secondary)</label>
                            <input type="text" class="form-control" id="address" name="address_secondry" aria-describedby="emailHelp" placeholder="Enter Seconday Address" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Street</label>
                            <input type="text" class="form-control" id="street" name="street" aria-describedby="emailHelp" placeholder="Enter Street" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" aria-describedby="emailHelp" placeholder="Enter Postal Code" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Select list:</label>
                          <select class="form-control" id="state" name="state">
                            @foreach($states as $key=>$value)
                            <option value="{{$value->name}}">{{$value->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="email">City</label>
                            <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="Enter City" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Book</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Service Provider</div>
                <div class="card-body">
                    <p>Organization Name: {{$serviceprovider->Organization_Name}}</p>
                    <p>Location: {{$serviceprovider->Location}}</p>
                    <p>Category: {{$serviceprovider->service_provider_category}}</p>
                    <p>Establishment : {{$serviceprovider->service_provider_category}}</p>
                    <p>Country: {{$serviceprovider->country}}</p>
                    <p>State: {{$serviceprovider->state}}</p>
                    <p>City: {{$serviceprovider->city}}</p>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection