@extends('layouts.email')

@section('content')
       {{ $joboffer->time}}
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear {{$employee->user->first_name}},</p><br>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please note that the job offer sent to you for {{$date}} has now expired, if you were unavailable for this shift, please ensure to check your calendar availability so you don’t get offers in time slots you are unavailable. <br> <br> Any questions, please don’t hesitate to contact us at admin@jobdate.com.au and we hope you continue to find work through Jobdate in the future. <br> <br> Jobdate, it's as simple as that!</p>

@endsection
