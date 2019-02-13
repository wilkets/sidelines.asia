@extends('auth.masterlogin')
@section('title', 'About Sidelines')

@section('content')

<div class="content">
  <div class="header about-logo">
      <div class="login-box" >
        <div class="login-logo">
          <a href="login"> <img src="/dist/img/sidelogo.png" class="sidelogo img-responsive"/></a>
        </div><!-- login-logo -->
      </div><!-- /.login-box -->
      <center class="slogan"><h2 class="about-header">"Connecting companies to job-seeking students through teacher recommendations"</h2></center>
  </div>

    <section class="content-about">
    <div class="row" style="margin-top:-70px!important;">

      <div class="box box-primary box-about1 col-md-6">
          <div class="box-header">
            <h2 class="sidelines-box-header"><span class="glyphicon glyphicon-question-sign"></span> <b>What is Sidelines</b></h2>
            <hr class="about-hr"/>
          </div><!-- /.box-header -->
          <div class="box-body">
              <p class="about-p">
                  Sidelines is a platform that helps companies connect with job-seeking students<br>
                  through teacher recommendations. In exchange, companies will offer tuition fee<br>
                  sponsorship or assistance, allowances, or many more.
                  <br/><br/>
                  Sidelines is still young. It was founded on November 9, 2015. But we, the founders,<br>
                  believe that the  youth's  future  will be better  through our help together with the<br>
                  teachers who believe in their students, and companies who are willing to help  the<br>
                  youth.
                  <br/><br/>
                  Be a part of this awesome journey in building towards a better and brighter future.
                  <br/>
               </p>
               <hr class="about-hr" style="margin-top: 10px;"/>
           </div>
           <div class="about-footer">
               <center class="about-btns">
                   <a class="btn btn-primary btn-about" href="/" style="margin-right: 258px; margin-left: -37px;"><i class="glyphicon glyphicon-list-alt"></i> View Job Posts</a>
                   <a class="btn btn-primary btn-about" href="login"><i class="fa fa-sign-in"></i> Login </a>
                   <a class="btn btn-primary btn-about" href="preregister" style="margin-right: -27px;"><i class="fa fa-pencil-square-o"></i> Register </a>
               </center>
           </div>
      </div><!-- /.login-box-body -->

      <div class="box-about2 col-md-6">
          <div class="box-body">
            <iframe width="462" height="350" class="about-video"
                src="https://www.youtube.com/embed/URbpt6Wrz_0?autoplay=1" allowfullscreen>
            </iframe>
           </div>
      </div><!-- /.login-box-body -->
      </div>
      </section>

</div>
@endsection
