
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

                        <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello {{ $name }},</p>
                                    <p style="margin-bottom:8px; color:#5E6278">You have offially been invited to join {{ tenant()->id }} affiliate program 🎉</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Click the button below to start your registration.</p>
                        
                        <!--begin:Action-->
                        <a href="{{ tenant()->id }}.tracklia.com/signup/affiliate/invite/{{ $code }}" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">Register Now</a>
                        <p><a style="position: relative;" href="{{ tenant()->id }}.tracklia.com/signup/affiliate/invite/{{ $code }}"> Or click here to start</a></p>
                        <!--end:Action-->
                        <!--end:Email content-->
                                    
@include('layouts.email.footer2')