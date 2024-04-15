@extends('layouts.main')

@section('css')
<style>

  .about-sec-one {
    background-image: url('{{asset($page->image)}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}


.main-job {
    box-shadow: 0px 0px 32px 2px #00000038;
    padding: 15px 17px;
    border-radius: 15px;
    text-align: center;
    margin-top: 40px;
    height: 18rem !important;
}


</style>
@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="job-board">
    <div class="container-fluid">
        <div class="row">

            
            @foreach($get_all_new_job as $key => $val_newjob)
            <div class="col-md-4">
                <div class="main-job">
                    <div class="full-time">
                        <p> {{ $val_newjob->job_type }} </p>
                    </div>
                    <div class="center-info">
                        <h6> {{ $val_newjob->job_title }} </h6>
                        <p><a href="#"><i class="fa-solid fa-location-dot"></i> {{ $val_newjob->location }} </a></p>
                    </div>
                    <div class="apply">
                        <a href="{{route('apply_for_job',['id'=>$val_newjob->id])}}" class="custom-btn views">View Details</a>
                        <a href="{{route('apply_for_job',['id'=>$val_newjob->id])}}" class="custom-btn now">Apply Now</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>


        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="last-btn">
                    <a href="#">View More Jobs</a>
                </div>
            </div>
        </div> -->


    </div>
</section>


<!-- ============================================================== -->

<!-- Sandbox terms modal -->
<div class="modal fade" id="modal_agree_to_sandbox_terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sandbox terms</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h6>Community Guidelines</h6>
                    </div>
                    <div class="col-12">
                        <p>
                            Welcome to the Sandbox!
                        </p>
                        <p>
                            The Sandbox is meant to be a place to interact with other professionals while at work; learn from others, build relationships, and otherwise just ‘hang out’. This is the spirit in which these guidelines have been established. The discussions and the way all members and Preschool Portal employees are treated are always to be professional. The general rule of thumb to follow is that if the talk is inappropriate for a traditional workplace, then it is not appropriate here. Forums like the Sandbox are at their best when participants treat each other with respect and courtesy. Please be mindful of this when participating here in the Sandbox.
                        </p>
                        <p>
                            Preschool Portal will occasionally move discussions if they belong in a different category. We will also close/remove duplicate discussions and/or replies if they are causing confusion, are mean-spirited, or are otherwise inappropriate (see our Do’s/Don’ts below). Our intention is not to censor, but to foster an environment that is easy to use and productive for all those involved.
                        </p>
                    </div>
                    <div class="col-12 text-center">
                        <a target="_blank" href="#">Rules of conduct</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <a href="{{route('agree_to_sandbox_terms')}}" type="button" class="btn btn-primary">I agree to the terms</a>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
    <script>
        $(document).ready(() => {

            if (parseInt('{{\Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms}}') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
        });
    </script>
@endsection