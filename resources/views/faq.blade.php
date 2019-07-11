@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')

   <div class="container">
        <div class="row">

            <!-- *** PAGES MENU WITH MARGIN BOTTOM ***-->
         @include('layouts/partials/_left_navbar')
            <!-- *** PAGES MENU END***-->


            <div class="col-lg-9 col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Popular Questions</h2>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo1">1. How
                            do I post an add?</button>
                        <div id="demo1" class="collapse border border-primary pagebody">
                            Posting an add on <strong>Bigdeals.com</strong> is quick and easy! Simply click the green
                            <strong>Add Post</strong> button and follow the instructions.<br>
                            If you are not already logged in, you will need to log in as the first step of posting your
                            add.<br>
                            Your add will go live once it has been reviewed.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo2">2. How
                            do I edit my add?</button>
                        <div id="demo2" class="collapse border border-primary pagebody">
                            To edit an add, please go to your add's page and click on the <strong>Edit add</strong>
                            option.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo3">3. How
                            do I delete my ad?</button>
                        <div id="demo3" class="collapse border border-primary pagebody">
                            To delete an ad, please go to your ad's page and click on the <strong>Delete add</strong>
                            option.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo4">4. I
                            posted an add but can't find it. What's wrong?</button>
                        <div id="demo4" class="collapse border border-primary pagebody">
                            Tip: you can keep track of your adds easily by logging in to your account and visiting your
                            <strong>My adds</strong> page! <br>
                            Your add may not be live due to one of the following reasons:
                            <ul>
                                <li>
                                    It is still under review - this will show on your My Ads page, under Adds under
                                    review
                                </li>
                                <li>It may have it violated our posting rules - if your ad needs to be edited before it
                                    can be
                                    published, this will show on your My Ads page, under Ads that need editing</li>
                            </ul>
                            If you have been waiting longer than 24 hours for a response from us, you may have given us
                            the wrong contact details when you posted the ad. Try posting again or contact us.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo5">5. Why
                            has my add been rejected?</button>
                        <div id="demo5" class="collapse border border-primary pagebody">
                            All of the ads are manually reviewed - if your ad violates our <strong>posting
                                rules</strong> it will be
                            rejected. You can read what changes you have to make before the ad can be approved in the
                            rejection email.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo6">6. I'm
                            getting contacted about an add I didn't post. Can you help me?</button>
                        <div id="demo6" class="collapse border border-primary pagebody">
                            Of course. Please contact us and we will help you right away.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo7">7. How
                            do I sign up for a user account on Bigdeals.com?</button>
                        <div id="demo7" class="collapse border border-primary pagebody">
                            Signing up for an account on <strong>Bigdeals.com</strong> is quick, easy and completely
                            free! To sign up on
                            <strong>Bigdeals.com</strong>, please go to the Sign up page and follow the instructions.
                            You can sign up with
                            an email address or through your Facebook account.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo8">8.
                            How do I log in and log out of my account?</button>
                        <div id="demo8" class="collapse border border-primary pagebody">
                            To log in to your account, simply go to the <strong>Log in</strong> page and enter your
                            email and
                            <strong>Bigdeals.com</strong> password. If you have created an account via Facebook,
                            click on "Continue
                            with Facebook" and follow the instructions.<br>
                            To log out of your account, simply click the <strong>log out</strong> option.
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse" data-target="#demo9">9.
                            Why can't I log in to my account?</button>
                        <div id="demo9" class="collapse border border-primary pagebody">
                            If you are having trouble logging in to your account, please check that you
                            have:
                            <ul>
                                <li>Signed up for an account.</li>
                                <li>Entered the correct email address and password on the log in page.</li>
                            </ul>
                            If you are still having trouble accessing your account, please contact us.
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop