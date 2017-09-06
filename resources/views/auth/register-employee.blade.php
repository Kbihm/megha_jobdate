@extends('layouts.app')

@section('content')

<div class="container">

<div class="col-md-8 col-md-offset-2">

    <h2>Register as an Employee</h2>
    <hr>

            <div class="card">
                <div class="content">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register/employee') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role" value="{{ old('role')}}">
                                @foreach($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                                </select>



                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('second_role') ? ' has-error' : '' }}">
                            <label for="second_role" class="col-md-4 control-label">Secondary Role</label>

                            <div class="col-md-6">
                                <select id="second_role" class="form-control" name="second_role" value="{{ old('second_role')}}">
                               <option default disabled selected value> None </option>
                                @foreach($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                                @endforeach
                                </select>


                                @if ($errors->has('second_role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="role" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">

                                <select id="role" class="form-control" name="gender" value="{{ old('gender')}}">
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                                    <option value="Other"> Other </option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fulltime') ? ' has-error' : '' }}" style="display:none;">
                            <label for="fulltime" class="col-md-4 control-label">Are you looking for fulltime work?</label>

                            <div class="col-md-6">
                                 <select class="form-control" name="fulltime" id="fulltime">
                                <option value="TRUE">Yes</option>
                                <option value="FALSE">No</option>
                                </select>
                                @if ($errors->has('fulltime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fulltime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('hourly_rate') ? ' has-error' : '' }}">
                            <label for="hourly_rate" class="col-md-4 control-label">Desired Hourly Rate</label>

                            <div class="col-md-6">
                                <input id="hourly_rate" type="number" step="0.01" class="form-control" name="hourly_rate" value="{{ old('hourly_rate') }}">

                                @if ($errors->has('hourly_rate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hourly_rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h5 class="text-center"> Where you want to work </h5>
                               <div class="form-group">
                                  <label class="col-md-10 control-label text-center">Search</label>
                                   <div class="col-md-10 text-center">
                                        <input id="pac-input" type="text" class="form-control" placeholder="Enter a location">
                                   </div>

                               </div>
                               <div id="map" style="display:none;"></div>
                               <div class="form-group">
                                   <label class="col-md-4 control-label">Address</label>
                                   <div class="col-md-6">
                                       <textarea id="location" name="address" class="form-control" ></textarea>
                                       <input type="text"  name="lat" id="lat" value="" style="display:none;"><br>
                                       <input type="text" name="lon" id="lon" value="" style="display:none;"><br>
                                   </div>
                              </div>

                              <div class="form-group">
                                   <label class="col-md-4 control-label">Radius</label>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="radius" value="">
                                   </div>
                               </div>

                               <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">State</label>
                                     <div class="col-md-6">
                                    <select id="state" class="form-control" name="state" value="" required="required">

                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Region</label>
                                    <div class="col-md-6">
                                    <select id="region" class="form-control" name="region" required="required">

                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Area</label>

                                    <div class="col-md-6">
                                    <select id="area" class="form-control" name="area" value="">

                                    </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('suburb') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Suburb</label>
                                    <div class="col-md-6">
                                    <select id="suburb" class="form-control" name="suburb" value="">

                                    </select>
                                    </div>
                                </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <p><small class="text-muted"> If you are under the age of 18, you must consult a parent or guardian prior to signing up. </small></p>
                                <p><small class="text-muted"> By creating an account you are agreeing to the <a href="http://jobdate.com.au/tos">Terms and Conditions.</a>  </small></p>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    </div>
  <script type="text/javascript" src="/region-script.js"></script>
@endsection
@section('view.scripts')
<script>
function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
      });


      var input = document.getElementById('pac-input');
      var autocomplete = new google.maps.places.Autocomplete(input);

      // Bind the map's bounds (viewport) property to the autocomplete object,
      // so that the autocomplete requests use the current map bounds for the
      // bounds option in the request.
      autocomplete.bindTo('bounds', map);

      /*var infowindow = new google.maps.InfoWindow();
      var infowindowContent = document.getElementById('infowindow-content')
      infowindow.setContent(infowindowContent);*/
      var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
      });

      autocomplete.addListener('place_changed', function() {
        //infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        /*infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;*/
        document.getElementById('location').value  = place.formatted_address;
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lon').value = place.geometry.location.lng();
        //infowindow.open(map, marker);
      });
 }
</script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj7WUySaRkd1dlnpKckEXSE7adrUkgzoA&libraries=places&callback=initMap" async defer></script>
@endsection
