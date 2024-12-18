@extends('layouts.guest')
@section('title',  'Pricing' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('description',  '' )
@section('imagealt',  'offer image' )
@section('image',  asset("publicassets/images/ogimg.jpg") )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<!-- PRICING-1
============================================= -->
<section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
    <div class="container">


        <!-- SECTION TITLE -->	
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-8">
                <div class="section-title mb-70">	

                    <!-- Title -->	
                    <h2 class="s-52 w-700">Simple, Flexible Pricing</h2>	

                    <!-- TOGGLE BUTTON -->
                    <div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
                        <span class="toggler-txt">Billed monthly</span>
                    </div>
                </div>	
            </div>
        </div>	<!-- END SECTION TITLE -->	


        <!-- PRICING TABLES -->
        <div class="pricing-1-wrapper">
            <div class="row row-cols-1 row-cols-md-3">

                @foreach ($plans as $plan)
                <!-- STARTER PLAN -->
                <div class="col">
                    <div id="pt-1-1" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">


                        <!-- TABLE HEADER -->
                        <div class="pricing-table-header">

                            <!-- Title -->
                            <h5 class="s-24 w-700">{{ ucfirst($plan->name) }}</h5>

                            <!-- Price -->	
                            <div class="price">								
                                <sup class="color--black">$</sup>								
                                <span class="color--black">{{ $plan->cost }}</span>
                                <sup class="validity color--grey">&nbsp;/&ensp;mo</sup>
                                <p class="color--grey">{{ $plan->about }}</p>
                            </div>

                            <!-- Button -->
                            <a href="{{ route('start',['plan'=>$plan->id]) }}" class="pt-btn btn r-04 btn--theme hover--theme">Get srarted - it's free</a>
                            <p class="p-sm btn-txt text-center color--grey">No credit card required</p>

                        </div>	<!-- END TABLE HEADER -->


                        <!-- PRICING FEATURES -->
                        <ul class="pricing-features color--black ico-10 ico--green mt-25">
                            <li><p><span class="flaticon-check"></span> 2 free projects</p></li>
                            <li><p><span class="flaticon-check"></span> 1 GB of cloud storage</p></li>
                            <li><p><span class="flaticon-check"></span> For personal use</p></li>
                            <li class="disabled-option"><p><span class="flaticon-check"></span> Weekly data backup</p></li>
                            <li class="disabled-option"><p><span class="flaticon-check"></span> No Ads. No trackers</p></li>	
                            <li><p><span class="flaticon-check"></span> 12/5 email support</p></li>
                        </ul>	


                    </div>
                </div>	<!-- END STARTER PLAN -->
                    
                @endforeach

            </div>
        </div>	<!-- PRICING TABLES -->

    
    </div>	   <!-- End container -->
</section>	<!-- END PRICING-1 -->


<!-- DIVIDER LINE -->
<hr class="divider">




<!-- PRICING COMPARE
============================================= -->
<section id="comp-table" class="pt-100 pb-60 pricing-section division">
    <div class="container">


        <!-- SECTION TITLE -->	
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-9">
                <div class="section-title mb-70">	

                    <!-- Title -->	
                    <h2 class="s-52 w-700">Compare Our Plans</h2>	

                    <!-- Text -->	
                    <p class="p-xl">Complete list of features available in our pricing plans</p>
                        
                </div>	
            </div>
        </div>


        <!-- PRICING COMPARE -->
        <div class="comp-table wow fadeInUp">
            <div class="row">
                <div class="col">


                    <!-- Table -->	
                    <div class="table-responsive mb-50">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th style="width: 34%;"></th>
                                    <th style="width: 22%;">Starter</th>
                                    <th style="width: 22%;">Basic</th>
                                    <th style="width: 22%;">Premium</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <th scope="row" class="text-start">Available Projects</th>
                                    <td class="color--black">Up to 2</td>
                                    <td class="color--black">Up to 250</td>
                                    <td class="color--black">Unlimited</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Available Storage</th>
                                    <td class="color--black">2Gb</td>
                                    <td class="color--black">50Gb</td>
                                    <td class="color--black">350Gb</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Private Cloud Hosting</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">User Permissions</th>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Direct Integrations</th>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Reusable Components</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Data Backup</th>
                                    <td class="color--black">Weekly</td>
                                    <td class="color--black">Daily</td>
                                    <td class="color--black">Daily</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">No Ads. No Trackers</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Advanced Security</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Shared Team Workspace</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Team Management</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr class="table-last-tr">
                                    <th scope="row" class="text-start">Customer Support</th>
                                    <td class="color--black">Limited</td>
                                    <td class="color--black">Basic</td>
                                    <td class="color--black">Priority</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>	<!-- End Table -->	

                </div>
            </div>
        </div>	<!-- END PRICING COMPARE -->


        <!-- PRICING COMPARE PAYMENT -->
        <div class="comp-table-payment">	
            <div class="row row-cols-1 row-cols-md-3">


                <!-- Payment Methods -->
                <div class="col col-lg-5">
                    <div id="pbox-1" class="pbox mb-40 wow fadeInUp">

                        <!-- Title -->
                        <h6 class="s-18 w-700">Accepted Payment Methods</h6>

                        <!-- Payment Icons -->
                        <ul class="payment-icons ico-45 mt-25">
                            <li><img src="{{ url('publicassets/images/png_icons/visa.png') }}" alt="payment-icon"></li>
                            <li><img src="{{ url('publicassets/images/png_icons/am.png') }}" alt="payment-icon"></li>
                            <li><img src="{{ url('publicassets/images/png_icons/discover.png') }}" alt="payment-icon"></li>
                            <li><img src="{{ url('publicassets/images/png_icons/paypal.png') }}" alt="payment-icon"></li>	
                            <li><img src="{{ url('publicassets/images/png_icons/jcb.png') }}" alt="payment-icon"></li>
                            <li><img src="{{ url('publicassets/images/png_icons/shopify.png') }}" alt="payment-icon"></li>
                        </ul>

                    </div>
                </div>	


                


                <!-- Payment Encrypted -->
                <div class="col col-lg-3">
                    <div id="pbox-3" class="pbox mb-40 wow fadeInUp">

                        <!-- Title -->
                        <h6 class="s-18 w-700">SSL Encrypted Payment</h6>

                        <!-- Text -->
                        <p>Your information is protected by 256-bit SSL encryption.</p>

                    </div>
                </div>	


            </div>
        </div>	<!-- END PRICING COMPARE PAYMENT -->


    </div>	   <!-- End container -->
</section>	<!-- END PRICING COMPARE -->
@endsection