@extends('layouts.email')

@section('content')

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear, {{ $user->first_name }}<br> </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please note that your job request has successfully been sent to {{$employee->first_name}} for the job request on {{$date}}
<br> <br>
We hope you continue to find staff through Jobdate and if there is anything we can do, please don’t hesitate to contact us on admin@jobdate.com.au
<br> <br>
Jobdate, it's as simple as that!</p>

@endsection
