
@include('layouts.email.header')

    
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
                <tbody>
                    <tr>
                        <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                            <!--begin:Email content-->
                            <div style="text-align:center; margin:0 60px 34px 60px">
                                <!--begin:Logo-->
                                <div style="margin-bottom:17px">
                                    <a href="https://tracklia.com" rel="noopener" target="_blank">
                                        <img alt="Logo" src="{{ url('public/assets/media/logos/tracklia_black_logo.png') }}"  style="height: 35px" />
                                    </a>
                                </div>
                                <!--end:Logo-->
                                

                                <!--begin:Text-->
                                <div style="text-align:start; font-size: 13px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">

                                    <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello {{ $user->name }},</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Welcome to Tracklia! 🎉 We’re thrilled to have you on board as part of our community of businesses managing affiliates efficiently and effectively.</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Here are your account details</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Your login email is {{ $user->email }}</p>
                                    <p style="margin-bottom:8px; color:#5E6278">Your Password is {{ $password }} </p>
                                    <p style="margin-bottom:8px; color:#5E6278">Login in to your new affiliate management system <a href="{{ $website }}"> {{ $website }} </a></p>

                                    <p style="margin-bottom:8px; color:#20243c; font-size: 17px; font-weight:500">What’s Next?</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Explore Your Dashboard</b><br/> all the tools you need to create, track, and manage your affiliate programs seamlessly.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Customize Your Affiliate Program</b><br/> Tailor your settings to suit your business needs and get your program up and running in no time.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px"><b>Need Help?</b><br/> Our support team is here for you! Feel free to reach out anytime at business@tracklia.com or check out our Help Center.</p>
                                    <p style="margin-bottom:8px; color:#5E6278; margin-bottom:13px">We’re committed to helping you grow and succeed. Let’s get started! 🚀</p>
                                    <!--begin:Action-->
                                    <a href="{{ $website }}" target="_blank" style="position: relative; left: 50%; transform: translateX(-50%);background-color:#50cd89; border-radius:6px; display:inline-block; margin-top:27px; padding:11px 19px; color: #FFFFFF; font-size: 14px; font-weight:500;font-family:Arial,Helvetica,sans-serif;">Start managing your Affiliates!</a>
                                    <!--end:Action-->
                                    <!--end:Email content-->
                                    
@include('layouts.email.footer')