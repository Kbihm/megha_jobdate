 @extends('layouts.app')

@section('title')
Search Employees
@endsection

@section('content')

    <div class="col-md-3">

        <div class="card card-refine">


        <div class="header">
            <h4 class="title">Refine
                <!--<button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="" data-original-title="Reset Filter">
                    <i class="fa fa-refresh"></i>
                </button>-->
            </h4>
        </div>

        <div class="content">
                        <div class="panel-group" id="accordion">
                            <form class="form" role="form" method="POST" action="/search">
                                                    {{ csrf_field() }}
                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refinePrice" aria-expanded="true" class="collapsed">
                                          Area
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refinePrice" class="panel-collapse collapse in">
                                      <div class="panel-body">

                                        <div class="form-group">
                                            <label>Search</label>
                                            <input id="pac-input" type="text" class="form-control" placeholder="Enter a location">
                                            <input type="hidden" id="lat" value="" >
                                            <input type="hidden" id="lon" value="">
                                            <input type="range" id="rangeInput" min="0" max="100" onchange="updateTextInput(this.value);" >
                                            <input type="hidden" id="textInput" value="">
                                            <input type="button" id="click_search"value="search">
                                        </div>
                                        <div id="map" style="display:none;"></div>

                                                     <div class="form-group">
                                                        <label>State</label>
                                                        <select id="state" class="form-control" required name="state" value="">
                                                            @if (isset($_POST['state']))
                                                                <option value="{{ $_POST['state'] }}" id="">{{ $_POST['state'] }}</option>
                                                            @endif
                                                            <option value="" id="">Select a State</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Region</label>
                                                        <select id="region" class="form-control" required name="region" value="">
                                                            @if (isset($_POST['region']))
                                                                    <option value="{{ $_POST['region'] }}" id="">{{ $_POST['region'] }}</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Area</label>
                                                        <select id="area" class="form-control" name="area" value="">
                                                            @if (isset($_POST['area']))
                                                                <option value="{{ $_POST['area'] }}" id="">{{ $_POST['area'] }}</option>
                                                            @endif
                                                            <option value="any">Any</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Suburb</label>
                                                        <select id="suburb" class="form-control" name="suburb" value="">
                                                            @if (isset($_POST['suburb']))
                                                                <option value="{{ $_POST['suburb'] }}" id="">{{ $_POST['suburb'] }}</option>
                                                            @endif
                                                            <option value="any">Any</option>
                                                        </select>
                                                    </div>

                                         </div>
                                    </div>
                                  </div>

                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refineClothing" aria-expanded="true" class="collapsed">
                                          Availability
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refineClothing" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                            <!--<div class="form-group">
                                            <label class="checkbox" for="any_date">Any Date
                                             <input type="checkbox" value="any_date" id="any_date" data-toggle="checkbox" checked>
                                             </label>

                                            </div>                    -->

                                            <div class="form-group">
                                                <label>Date (Optional)</label>
                                                <input name="date" type="text" id="date"  class="datepicker form-control"
                                                @if (isset($_POST['date']))
                                                    value="{{ $_POST['date'] }}"
                                                @endif
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label>Time of Day</label>
                                                <select name="time" class="form-control">
                                                    @if (isset($_POST['time']))
                                                        <option value="{{ $_POST['time'] }}" id="">{{ $_POST['time'] }}</option>
                                                    @endif
                                                    <option value="any">Any</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="day">Day</option>
                                                    <option value="night">Night</option>
                                                </select>
                                            </div>

                                      </div>
                                    </div>
                                  </div>


                                   <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h6 class="panel-title">
                                        <a data-toggle="collapse" href="#refineDesigner" aria-expanded="true">
                                          About
                                          <i class="fa fa-caret-up pull-right"></i>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="refineDesigner" class="panel-collapse collapse in">
                                      <div class="panel-body">
                                                <div class="form-group">
                                                <label>Role</label>
                                                <select id="role" class="form-control" name="role" value="">
                                                    @if (isset($_POST['role']))
                                                        <option value="{{ $_POST['role'] }}" id="">{{ $_POST['role'] }}</option>
                                                    @endif
                                                    <option value="any">Any</option>
                                                    @foreach ( App\Settings::$roles as $role)
                                                    <option value="{{ $role }}">{{ $role }} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Looking for Fulltime Work</label> <br/>
                                                <select name="fulltime" id="fulltime" class="form-control">
                                                    @if (isset($_POST['fulltime']))
                                                        <option value="{{ $_POST['fulltime'] }}" id="">{{ $_POST['fulltime'] }}</option>
                                                    @endif
                                                    <option value="any">Any</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        <button class="btn btn-default btn-xs btn pull-right btn-simple" type="submit">
                                            Search <i class="fa fa-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                  </div><!-- end panel -->

                                                </form>

                                </div>

        </div>
        </div>

    </div>


    <div class="col-md-9"   id="result_insert">

                @if (sizeOf($employees) == 0)
                <div class="text-center">
                    <h2 class="text-muted"> No Results Found </h2>
                    <p> Try widening your search query. </p>
                </div>
                @else

                    @foreach($employees as $employee)
                        @if ($employee->user == null)

                        @else
                        <div class="card card-horizontal">
                            <div class="row">
                                @if (Storage::disk('local')->has($employee->id . '.jpg'))
                                <div class="col-md-5">


                                    <div class="image" style="background-image: url({{route('image', ['filename' => $employee->id.'.jpg'])}}); background-position: center center; background-size: cover;">
                                        <img src="{{route('image', ['filename' => $employee->id.'.jpg'])}}" alt="..." style="display: none;">
                                        <div class="filter filter-azure">
                                            <a type="button" class="btn btn-neutral btn-round" href="/staff/{{ $employee->id }}">
                                                <i class="fa fa-heart"></i> Hire
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7">
                                @else
                                <div class="col-md-12" style="margin-left:20px">
                                @endif


                                     <div class="content">

                                        @if( $employee->average_rating > 1.9 && sizeOf($employee->comments) > 2 )
                                       <p class="category text-info">
                                            <i class="fa fa-trophy"></i> Best of JobDate
                                        </p>
                                        @else
                                            <p> &nbsp; </p>
                                        @endif

                                        <a class="card-link" href="/staff/{{ $employee->id }}">
                                            <h4 class="title"> {{ $employee->user->first_name }} {{ $employee->user->last_name }}</h4>
                                        </a>
                                        <a class="card-link" href="/staff/{{ $employee->id }}">
                                            <p class="description">
                                                @if ($employee->about !== null)
                                                    {{ str_limit($employee->about, $limit = 200, $end = '...') }}
                                                @endif
                                            </p>
                                        </a>
                                         <div class="footer">
                                            <div class="stats">
                                                <a class="card-link" href="/staff/{{ $employee->id }}">
                                                   <i class="fa fa-usd"></i>
                                                   @if ($employee->hourly_rate !== null)
                                                        {{ number_format($employee->hourly_rate, 2) }}
                                                   @endif
                                                </a>
                                            </div>
                                            <div class="stats">
                                              <a class="card-link" href="/staff/{{ $employee->id }}">
                                                <i class="fa fa-briefcase"></i> {{ $employee->role }}
                                                @if($employee->second_role !== null)
                                                 / {{$employee->second_role}}
                                                @endif
                                              </a>
                                            </div>
                                            <div class="stats">
                                               <a class="card-link" href="/staff/{{ $employee->id }}">
                                                <i class="fa fa-star"></i> {{ sizeOf($employee->comments) }} Reviews ({{ number_format($employee->average_rating / 2 * 100, 0) }}%)
                                               </a>
                                            </div>
                                            <div class="stats">
                                                @if ($employee->gender == 0)
                                                    <i class="fa fa-male"></i>
                                                @elseif ($employee->gender == 1)
                                                    <i class="fa fa-female"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach

                    {{ $employees->links() }}

                    @endif
</div>

<!--<script type="text/javascript" src="/region-script.js"></script>-->
<script type="text/javascript" >

    // $("#any_date").click(function () {

    //     $("#date").attr('disabled', true);

    // });

</script>

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
        infowindowContent.children['place-address'].textContent = address;
        document.getElementById('location').innerHTML = place.formatted_address;*/
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lon').value = place.geometry.location.lng();
        //infowindow.open(map, marker);
      });
 }
</script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj7WUySaRkd1dlnpKckEXSE7adrUkgzoA&libraries=places&callback=initMap" async defer></script>
<script>
function updateTextInput(val) {
          document.getElementById('textInput').value=val;
}
$(document).on('click','#click_search',function(e){
           var lat = $('#lat').val();
           lon = $('#lon').val();
           rangeInput = $('#textInput').val();
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
           })
           $.ajax({

               type: "POST",
               url: 'search_staff',
               data:{lat:lat,lon:lon,radius:rangeInput},
               success: function (data) {
                   console.log(data);
                   //$('.row_'+id).remove();
                   $('#result_insert').html('');
                   $('#result_insert').html(data);
               },
               error: function (data) {
                   console.log('Error:', data);
               }
           });
});
</script>
@endsection
