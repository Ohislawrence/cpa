
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

                                    <p style="margin-bottom:9px; color:#181C32; font-size: 18px; font-weight:600">Hello Tracklia,</p>
                                    <p style="margin-bottom:8px; color:#5E6278">You have a new sign up!</p>

                                    <!--begin:Action-->

                                    <!--end:Action-->
                                    <!--end:Email content-->
                                    
@include('layouts.email.footer')