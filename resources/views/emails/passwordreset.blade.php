
@include('layouts.email.header')

    
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                <tbody>
                    <tr>
                        <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                            <!--begin:Email content-->
                            <div style="text-align:center; margin:0 60px 34px 60px">
                                <!--begin:Logo-->
                                <div style="margin-bottom:17px">
                                    <a href="https://dealsintel.com" rel="noopener" target="_blank">
                                        <img alt="Logo" src="{{ url('public/assets/media/logos/logo-dealsintel.png') }}"  style="height: 35px" />
                                    </a>
                                </div>
                                <!--end:Logo-->
                                

                                <!--begin:Text-->
                                <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">

                                    <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello {{ $user->name }},</p>
                                    <p style="margin-bottom:8px; color:#5E6278">I hope this email finds you well. I wanted to personally reach out to thank you for your recent application to join our DealsIntel affiliate program. We're thrilled to have you on board and eager to explore the potential of our partnership.</p>
                                    <p style="margin-bottom:8px; color:#5E6278">I want to assure you that your application is receiving our full attention. Our team is currently reviewing it thoroughly to ensure that we can provide you with the best possible affiliate experience. We appreciate your patience during this process.</p>
                                    <p style="margin-bottom:8px; color:#5E6278">We will reach out to you promptly with an update via the Telegram username you provided. If you have any questions or concerns in the meantime, please don't hesitate to reach out to us.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px">Thank you once again for your interest in partnering with DealsIntel. We're excited about the prospect of working together and are committed to providing you with the support and resources you need to succeed as an affiliate.</p>
                                    
                                    
                                    <!--begin:Action-->
                                    <a href="{{ route('affiliate.dashboard') }}" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">See Your Dashboard</a>
                                    <!--end:Action-->
                                    <!--end:Email content-->
                                    
@include('layouts.email.footer')