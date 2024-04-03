<?php 
use App\User; 
use Carbon\Carbon;
use DateTime;
?>
<!doctype html>
<html lang="en">

@include('headerlink')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>


.fill-5 {
    animation: fill 5s linear 1;
}
.fill-4 {
    animation: fill 4s linear 1;
}
.fill-3 {
    animation: fill 3s linear 1;
}
.fill-2 {
    animation: fill 2s linear 1;
}
.fill-1 {
    animation: fill 1s linear 1;
}
@keyframes fill {
    0% {
        width: 0%;
    }

    100% {
        width: 100%;
    }
}
.progress {
    --bs-progress-height: 1rem;
    --bs-progress-font-size: 0.75rem;
    --bs-progress-bg: #e9ecef;
    --bs-progress-border-radius: 0.375rem;
    --bs-progress-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    --bs-progress-bar-color: #fff;
    --bs-progress-bar-bg: #0d6efd;
    --bs-progress-bar-transition: width 0.6s ease;
    display: flex;
    height: var(--bs-progress-height);
    overflow: hidden;
    font-size: var(--bs-progress-font-size);
    background-color: var(--bs-progress-bg);
    border-radius: var(--bs-progress-border-radius);
}
.progress-bar {
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow: hidden;
    color: var(--bs-progress-bar-color);
    text-align: center;
    white-space: nowrap;
    background-color: var(--bs-progress-bar-bg);
    transition: var(--bs-progress-bar-transition);
}


.newfeed_progress {
    background-color: #F5F7FC;
    border: 8px;
    padding: 8px 8px;
    margin-top: 13px;
}


.scroll{
    
    height:1000px;
    overflow-y: scroll;
    
}

/*header*/
li.nav-item.active {
    background-color: #b8bab7;
    border-radius: 10px;
}

.myaccount-tab-menu.nav a {
    display: block;
    padding: 20px;
    font-size: 16px;
    align-items: center;
    width: 100%;
    font-weight: bold;
    color: black;
}
.myaccount-tab-menu.nav a i {
    padding-right: 10px;
    /* background-color: #5798fc; */
}

.myaccount-tab-menu.nav {
    border: 1px solid;
}

.myaccount-tab-menu.nav .active, .myaccount-tab-menu.nav a:hover {
    background-color: #5798fc;
    color: white;
}

.account-details-form label.required {
    width: 100%;
    font-weight: 500;
    font-size: 18px;
}
.account-details-form input {
    border-width: 1px;
    border-color: white;
    border-style: solid;
    padding-left: 15px;
    color: black;
    width: 100%;
    border-radius: 3px;
    background-color: rgb(255, 255, 255);
    height: 52px;
    padding-left: 15px;
    margin-bottom: 30px;
    color: #000000;
    font-size: 15px;
}
.account-details-form legend {
    font-family: CottonCandies;
    font-size: 50px;
}
.editable {
    position: relative;
}
.editable-wrapper {
    position: absolute;
    right: 0px;
    top: -50px;
}

.editable-wrapper a {
    background-color: #17a2b8;
    border-radius: 50px;
    width: 35px;
    height: 35px;
    display: inline-block;
    text-align: center;
    line-height: 35px;
    color: white;
    margin-left: 10px;
    font-size: 16px;
}
.editable-wrapper a.edit{
    background-color: #007bff;
}

.profilebg1 {
    margin-top: -16px;
}

</style>

<body>

@include('layouts.front.css')
@include('layouts/front.header')


<section class="back">

    <div class="container-fluid">
    
    <div class="profilebg1" style="<?php if(Auth::user()->banner_image != ''){ echo "background-image: url('".asset(Auth::user()->banner_image)."') !important;"; }else{ echo 'background-image: url('.asset("images/profilebg.png").') !important;';} ?> background-size: cover !important;">
            <div class="row">
                <div class="col-md-12">
                <div class="profile1">
                        @if(Auth::user()->image != '')
                        <img src="{{asset(Auth::user()->image)}}" style="height:175px; width:175px;" class="img-fluid">
                        @else
                        <img src="{{asset('images/profilemain1.png')}}" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="profile-name-bg">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="profile-name">
                        <h5> {{Auth::user()->name}} {{Auth::user()->lname}} <span> {{Auth::user()->email}} </span></h5>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>

    <div class="container-fluid">
        <div class="feedDiv" data-toggle="modal" data-target="#feedModal">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="row">
            
            @include('teacher_menues')

                
                <div class="col-lg-6 col-md-8 scroll"> 


                    @foreach($get_my_pinned as $val_pinned)
                    <div class="comment_div">
    
                            <div class="newfeed">
    
                            <input type="hidden" name="" id="get_id" value="{{$val_pinned->post_id}}">
    
                            <div class="newfeed-profile-name">
    
                                <img style="height:60px; width:60px; border-radius:50px" src="{{asset(App\User::find($val_pinned->user_id)->image)}}" class="img-fluid">
    
                                <h4> {{App\User::find($val_pinned->user_id)->name}} <span> {{ Carbon::parse($val_pinned->created_at)->diffForHumans() }} </span></h4>
      
                            </div>
    
                            <div class="newfeed-image">
    
                                <p> {{App\Models\Post::find($val_pinned->post_id)->post}} </p>
    
                            </div>
    
                            <div class="newfeed-image">
    
                                <img style="height:400px; width:100%; border-radius:10px;" src="{{asset(App\Models\Post::find($val_pinned->post_id)->image)}}" class="img-fluid">
    
                            </div>
    
                             
                            <hr>
                 
    
                            </div>
                        
    
                    </div>
                    @endforeach()
            

                </div>


            <div class="col-md-3 sidebarleftprofile">

                @include('all_teacher')

            </div>

             
        </div>
    </div>

</section>


@include('footerlink')


</body>

</html>


<script>



</script>