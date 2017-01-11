@extends('layouts.app')



@section('content')

    <div class="row">
        <div class="col-md-3">

        <div class="card">
           

            @if ($user->employee_id != null)

                @if (Storage::disk('local')->has($user->employee_id . '.jpg'))
                    <div class="image">
                                        
                        <a href="#">
                            <img src="{{route('image', ['filename' => $user->employee_id.'.jpg'])}}" alt="...">
                        </a>
                        <div class="filter filter-azure">
                            <a type="button" class="btn btn-neutral btn-round" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-camera"></i> Change Picture
                            </a>
                        </div>
                    </div>
                @endif

            @endif
        <div class="content">
        <h4 class="title"> Manage your account </h4>

                <ul class="list-group">
                    <a class="list-group-item" href="/profile">Your Information</a>
                    @if ($user->employee_id != null)
                    <a class="list-group-item" href="/profile/skills" >Qualifications</a>
                    <a class="list-group-item" href="/profile/experience">Experience</a>
                    <a class="list-group-item" href="/profile/availability">Availability</a>
                    @endif
                    @if ($user->employer_id != null)
                    <a class="list-group-item" href="/profile/subscription" >Subscription</a>
                    
                    @endif
                    <a class="list-group-item" href="/profile/security">Security</a>
                    <a class="list-group-item active" href="/profile/delete">Delete My Account</a>
                </ul>

        <hr>

        <div class="footer">

        @if ($user->employee_id != null)
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
                    Upload/Change profile picture
                    </button>
                    <a class="btn btn-primary btn-block" href="/staff/{{ $user->employee_id }}"> How Employers see me </a>
        @endif
        </div>

        </div>
        </div>


        </div>
<div class="panel col-md-9 text-center">
    <h2> We're sorry to see you go </h2>
    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-fill col-md-3 col-md-offset-5"> Delete Account </button>
    <br>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">You cannot undo this action!</h4>
      </div>
      <div class="modal-body">
        
        <p class="text-center">If you delete your account, all of your saved profile details will also be deleted. These cannot be restored unless you create a brand new account. Continue?</p>


        <a href="/profile/destroy/{{ Auth::user()->id }}" class="btn btn-danger col-md-2 col-md-offset-5">Delete</a>
      </form>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            
      </div>
    </div>

  </div>
</div>
@endsection
