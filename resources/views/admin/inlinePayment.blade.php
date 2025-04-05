
@extends('layouts.guest')
@section('title',  'Subscribe to a plan' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('description',  '' )
@section('imagealt',  'offer image' )
@section('image',  asset("images/tracklia-page.jpg") )


@section('header')
@paddleJS
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
                    <h2 class="s-52 w-700">Hello {{ $merchant->name }},</h2>	

                    <!-- TOGGLE BUTTON -->
                    <div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
                        <span class="toggler-txt">You have choose to subscribe to our {{ $plan->name }} plan, click the button below to pay. </span>
                    </div>
                </div>	
            </div>
        </div>	<!-- END SECTION TITLE -->	


        <!-- PRICING TABLES -->
        <div class="pricing-1-wrapper center">
            <div class="row row-cols-1 row-cols-md-2 justify-content-center">
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
                            @if($plan->id == 1)
                            <x-paddle-button :checkout="$checkout" class="px-8 py-4 pt-btn btn r-04 btn--theme hover--theme">
                                Pay Now
                            </x-paddle-button>
                            @else
                            <a href="#" class="pt-btn btn r-04 btn--theme hover--theme">Coming Soon</a>
                            @endif
                            <p class="p-sm btn-txt text-center color--grey">No credit card required</p>

                        </div>	<!-- END TABLE HEADER -->

                    </div>
                </div>	<!-- END STARTER PLAN -->

            </div>
        </div>	<!-- PRICING TABLES -->

    
    </div>	   <!-- End container -->
</section>	<!-- END PRICING-1 -->


<!-- DIVIDER LINE -->


    <div class="container">
        <!-- PRICING COMPARE PAYMENT -->
        <div class="comp-table-payment">	
            <div class="row row-cols-1 row-cols-md-3 justify-content-center">


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
