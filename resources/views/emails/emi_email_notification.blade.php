<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width" name="viewport" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <title>BMW</title>
    </head>

    <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #eaf0f2;">
        <table
            bgcolor="#ffffff"
            cellpadding="0"
            cellspacing="0"
            class="nl-container"
            style="vertical-align: top; min-width: 320px; margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color:#eaf0f2; width: 840px;"
            valign="top"
            width="840"
        >
            <tbody>               
                <tr>
                    <td style="padding: 0px;" height="20"></td>
                </tr>
                <tr>
                    <td>
                        <table bgcolor="#ffffff" class="tophead" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="padding: 0;">
                            <tr>
                                <td align="left" bgcolor="#ffffff" style="background: #fff;padding:16px 0 0 16px;">
                                   <img src="{{ asset('images/bmw-email-logo.png') }}" alt="BMW" style="width: 53px;"> 
                                </td>
                            </tr>
                            <tr>
                                
                                <td style="padding: 0px;" height="200" align="center" bgcolor="#ffffff" style="background: #fff;">
                                    <img src="{{ asset('images/emil-icon.png') }}" alt="BMW" style="width: 250px;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table bgcolor="#ffffff" class="tophead" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="padding: 0;">
                            <tr>
                                <td align="center" style="padding: 30px 30px 50px 30px;">
                                    <p
                                        style="
                                            font-size: 30px;
                                            color: #003188;
                                            line-height: 1.2;
                                            text-align: left;
                                            word-break: break-word;
                                            mso-line-height-alt: 55px;
                                            margin: 0;
                                            font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
                                        "
                                    >
                                    Greetings {{$params['dealer_name']}} !,
                                    </p>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding: 0px 0 20px 0;">
                                    <img src="{{ asset('images/ADTG9En.png')}}" alt="" border="0" />
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 30px 30px 50px 30px;">
                                <p
                                        style="
                                            text-align: left;
                                            line-height: 1.5;
                                            word-break: break-word;
                                            font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
                                            font-size: 16px;
                                            margin: 0;
                                            color: #75757c;
                                        "
                                    >
                                    Please find below the details of the prospect(s), within your region, who have shown interest in offers from BMW Financial Services.
                                    </p> <br>
                                    <table cellpadding="5" style="width: 100%;">
                                    	<thead style="background:#ccc;">
                                    		<tr>
                                    			<th>SNo</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Preferred BMW Model</th>
                                                <th>Plan</th>
                                                <th>DateTime</th>
                                    		</tr>
                                    	</thead>
                                    	<tbody style="text-align: center;">
	                                    @foreach($params['data'] as $data)
	                                    	<tr>
	                                    		<td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ url('admin/chat') }}/{{ $data->mobile }}">{{ $data->first_name . ' ' . $data->last_name }}</a></td>
                                                <td>{{ $data->mobile }}</td>
                                                <td><a style="color: black; text-decoration: none" mailto="#">{{ $data->email }}</a></td>
                                                <td>{{ $data->model_name }}</td>
                                                <td>{{ $data->plan }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M, Y h:i A') }}</td>
	                                    	</tr>
	                                    @endforeach
	                                    </tbody>
	                                </table>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td align="center" style="padding: 0px 0 20px 0;">
                                    <a href="{{-- url('admin/lms/list') --}}?filter_eo=emi_optin_lead&dealer={{-- $params['dealer_code'] --}}" style="cursor: pointer;background: #2a76d8;padding: 10px 20px;text-decoration: none;color: #fff;box-shadow: 0px 1px 10px #2a76d8;font-weight: bold;font-size: 16px;" target="_blank">Click Here</a>
                                </td>
                            </tr> -->
                            <tr>
                                <td>
                                    <table bgcolor="#ffffff" class="tophead" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border-top: 3px solid #e5eaf3;">
                                        <tr>
                                            <td style="padding: 30px 30px 50px 30px;" align="center">
                                                 <p
                                        style="
                                            text-align: left;
                                            line-height: 1.5;
                                            word-break: break-word;
                                            font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
                                            font-size: 16px;
                                            margin: 0;
                                            color: #75757c;
                                        "
                                    >Thank you,</p>
                                    <p
                                        style="
                                            text-align: left;
                                            line-height: 1.5;
                                            word-break: break-word;
                                            font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
                                            font-size: 16px;
                                            
                                            margin: 0;
                                            color: #75757c;
                                        "
                                    >BMW Whatsapp Bot Team</p>
                                    </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" height="40">

                                </td>
                            </tr>
                            <tr>
                                <td height="20" bgcolor="#eaf0f2"></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #e5eaf3;padding:20px 0 20px;">
                                    <table bgcolor="#ffffff" class="tophead" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="padding: 0;">
                                        <tr>
                                            <td style="padding: 16px;">
                                                <p
                                                    style="
                                                        padding: 6px 12px;
                                                        text-align: center;
                                                        line-height: 1.5;
                                                        color: #6d89bc;
                                                        word-break: break-word;
                                                        font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;
                                                        font-size: 16px;
                                                        
                                                        margin: 0;
                                                    "
                                                >
                                                    <span style="font-size: 14px;">Copyright © 2021,</span><br> <strong>BMW AG</strong><br> A better company with a personalised employee experience.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                 <tr>
                    <td style="padding: 0px;" height="20"></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>