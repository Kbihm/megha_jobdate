@extends('layouts.email')

@section('content')

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi there, {{ $user->first_name }} </p>
             <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
Congratulations on your employment with <strong>{{ $employer->establishment_name }}</strong> on the <strong>{{ $date }}, during the {{$joboffer->time}}</strong>, if you need to contact the employer please do so on the following details, good luck with the job. <br>
Please ensure you bring with you to the job all certificates required for that job role (e.g RSA for bartender) and also take with you all payment information (e.g TFN and bank details)
<br>
<strong> Employer Phone: </strong> {{$employer->phone}} <br>
<strong>Employer Address: </strong> {{$employer->address}} <br>
Jobdate, it's as simple as that! <br>
Any questions or concerns please contact us at admin@jobdate.com.au
                        </p>
                        <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>
@endsection
