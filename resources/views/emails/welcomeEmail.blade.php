
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
                            <img alt="Logo" src="{{ url('public/assets/media/logos/tracklia_black_logo.png') }}"  style="height: 35px" />
                        </a>
                    </div>
                    <!--end:Logo-->
                    

                    <!--begin:Text-->
                    <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">

                        <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello {{ $user->name }},</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Welcome to {{ tenant()->id }} 🎉 We're excited to have you onboard and can’t wait to see you succeed.</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Here are your account details</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Your login email is {{ $user->email }}</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Your Password is <b>{{ $password }}</b> </p>
                                    @if ($activeSetting ==1)
                                    @else
                                    <p style="margin-bottom:8px; color:#5E6278">We will review your application and get back to you ASAP.</b> </p>
                                    @endif
                                    

                                    <p style="margin-bottom:8px; color:#20243c; font-size: 17px; font-weight:500">What Can You Do on {{ tenant()->id }}?</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Access Your Dashboard</b><br/> Monitor your performance, track clicks, conversions, and earnings, all in one place.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Share Your Links</b><br/> Use your unique affiliate links to start promoting and earning commissions.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Track Your Progress</b><br/> Stay updated with real-time insights to optimize your efforts.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px">We’re thrilled to have you as part of the team and can’t wait to celebrate your success! 🚀</p>
                        
                        <!--begin:Action-->
                        <a href="{{ tenant()->id }}.tracklia.com" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">Login to your account</a>
                        <!--end:Action-->
                        <!--end:Email content-->
                                    
@include('layouts.email.footer2')