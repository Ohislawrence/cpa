@extends('layouts.guest')
@section('title',  'Pricing' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('description',  '' )
@section('imagealt',  'offer image' )
@section('image',  asset("images/tracklia-page.jpg") )


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
                            @if($plan->id == 1)
                            <a href="{{ route('start',['plan'=>$plan->id]) }}" class="pt-btn btn r-04 btn--theme hover--theme">Get srarted - it's free</a>
                            @else
                            <a href="#" class="pt-btn btn r-04 btn--theme hover--theme">Coming Soon</a>
                            @endif
                            <p class="p-sm btn-txt text-center color--grey">No credit card required</p>

                        </div>	<!-- END TABLE HEADER -->

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
                                    @forelse ($plans as $planer)
                                        <th style="width: 22%;">{{ ucfirst($planer->name) }}</th>
                                    @empty 
                                    @endforelse
                                    
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ( $features as $feature)
                                    <tr>
                                        <th scope="row" class="text-start">{{ $feature->name }}</th>
                                        @foreach ( $plans as $planf)
                                            <td class="ico-15 disabled-option">
                                                @php
                                                $get = $plafeatures
                                                    ->where('plan_id', $planf->id)
                                                    ->where('feature_id', $feature->id)
                                                    ->first();
                                                $is_included = $get->is_included;
                                                    
                                                @endphp
                                                @if(!empty($get->option) && $is_included == true)
                                                    {{ $get->option }}
                                                @else
                                                    {!! $is_included ? '<span class="flaticon-check"></span>' : '<span class="flaticon-cancel"></span>' !!}
                                                @endif
                                                
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>	<!-- End Table -->	

                </div>
            </div>
        </div>	<!-- END PRICING COMPARE -->


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