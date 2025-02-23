
@include('layouts.email.header')

    
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                <tbody>
                    <tr>
                        <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                            <!--begin:Email content-->
                            <div style="text-align:center; margin:0 60px 34px 60px">
                                <!--begin:Logo-->
                                <div style="margin-bottom:17px">
                                    <a href="{{ tenant()->kyc->website }}" rel="noopener" target="_blank">
                                        <img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="h-20px logo theme-dark-show" style="height: 35px"/>
                                    </a>
                                </div>
                                <!--end:Logo-->
                                

                                <!--begin:Text-->
                                <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">

                                    <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello {{ $user->name }},</p>
                                    <p style="margin-bottom:8px; color:#5E6278">We received a request to reset your password for your account. If you made this request, please click the button below to set a new password:</p>
                                    <p style="margin-bottom:8px; color:#5E6278"><a href="{{ $resetURL }}"> My Password</a></p>
                                    <p style="margin-bottom:8px; color:#5E6278">For security reasons, this link will expire in 30 minutes. If you did not request a password reset, you can safely ignore this email, and your password will remain unchanged.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px">If you have any questions or need further assistance, feel free to reach out to our support team at {{ tenant()->kyc->business_email }}</p>
                                    
                                    
                                    <!--begin:Action-->
                                    <a href="#" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">See Your Dashboard</a>
                                    <!--end:Action-->
                                    <!--end:Email content-->
                                    
@include('layouts.email.footer')