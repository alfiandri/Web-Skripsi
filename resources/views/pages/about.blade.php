@extends('layouts.default')

@section('title', ' - About Me')

@section('contents')
	<!-- carousel -->
  <div class="jumbotron" style="background-image: url({{ asset('img/header.jpg') }})">
  	<div class="container center">
  		<div class="ab-title"> 
	  		Alfiandri Putra Perdana
	  	</div>
	  	<div class="ab-desc light">
	  		Back-end Developer
	  	</div>
	  </div>
	</div>
	<!-- About Section -->
  <section id="about" class="about-section section-padding">
    <div class="container">
      <h2 class="section-title light">About Me</h2>
      <div class="row">
        <div class="col s4">
          <div class="biography">
            <ul>
              <li><strong>Name:</strong> Alfiandri Putra Perdana</li>
              <li><strong>Place of birth:</strong> Medan</li>
              <li><strong>Date of birth:</strong> 26 August 1997</li>
              <li><strong>Address:</strong> Jl. Brigjend. Katamso Gg. Wakaf No. 2B</li>
              <li><strong>Status:</strong> Single</li>
              <li><strong>Nationality:</strong> Indonesian</li>
              <li><strong>Language:</strong> Indonesian, English (Passive)</li>
              <li><strong>Phone:</strong> +62852 6112 8536</li>
              <li><strong>Email:</strong> alfiandri.putra@gmail.com</li>
            </ul>
          </div>
        </div> <!-- col-md-4 -->

        <div class="col s8">
          <div class="short-info">
            <h3>Objective</h3>
            <p class="justify">Hello! I am Alfiandri, a back-end web developer who responsible for server-side web application logic and integration of the work front-end web developers do. Back-end developers usually write web services and APIs used by front-end developers and mobile application developers.</p>
          </div>

          <div class="short-info">
            <h3>What I Do ?</h3>
            <p class="justify">In order to make the server, application, and database communicate with each other, I use server-side languages which is PHP to build an application, and tools DBMS like MySQL, and PostgreSQL to find, save, or change data and serve it back to the user in front-end code. To speed up the production, I use some PHP framework like Laravel and CodeIgniter; I also use version control software like Git.</p>
          </div>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </section><!-- End About Section -->

  <!-- Resume Section -->
  <section id="resume" class="resume-section section-padding">
    <div class="container">
      <h2 class="section-title ">Education</h2>
      <div class="row">
        <div class="col s12">
          <div class="resume">
            <ul class="timeline">
              <li>
                <div class="posted-date">
                  <span class="month">2003-2009</span>
                </div><!-- /posted-date -->

                <div class="timeline-panel">
                  <div class="timeline-content">
                    <div class="timeline-heading">
                      <h3>Elementary School</h3>
                      <span>SDN 060930 Medan</span>
                    </div><!-- /timeline-heading -->

                    <div class="timeline-body">
                      <p>I spent six years at this school, which is I started learning a lot of things such as math and basic science.</p>
                    </div><!-- /timeline-body -->
                  </div> <!-- /timeline-content -->
                </div><!-- /timeline-panel -->
              </li>

              <li class="timeline-inverted">
                <div class="posted-date">
                  <span class="month">2009-2012</span>
                </div><!-- /posted-date -->

                <div class="timeline-panel">
                  <div class="timeline-content">
                    <div class="timeline-heading">
                      <h3>Junior High School</h3>
                      <span>SMPN 34 Medan</span>
                    </div><!-- /timeline-heading -->

                    <div class="timeline-body">
                      <p>From this school, not only I studied about the lesson, I also learned about some love.</p>
                    </div><!-- /timeline-body -->
                  </div> <!-- /timeline-content -->
                </div> <!-- /timeline-panel -->
              </li>

              <li>
                <div class="posted-date">
                  <span class="month">2012-2015</span>
                </div><!-- /posted-date -->

                <div class="timeline-panel">
                  <div class="timeline-content">
                    <div class="timeline-heading">
                      <h3>Senior High School</h3>
                      <span>SMAN 13 Medan</span>
                    </div><!-- /timeline-heading -->

                    <div class="timeline-body">
                      <p>Here we go, I made it into one of the favorite schools in Medan. At that time, I thought I have to start thinking about the future; the only question that appeared in my mind was 'where would I continue my education?'</p>
                    </div><!-- /timeline-body -->
                  </div> <!-- /timeline-content -->
                </div><!-- /timeline-panel -->
              </li>

              <li class="timeline-inverted">
                <div class="posted-date">
                  <span class="month">2015-now</span>
                </div><!-- /posted-date -->

                <div class="timeline-panel">
                  <div class="timeline-content">
                    <div class="timeline-heading">
                      <h3>College</h3>
                      <span>STMIK Triguna Dharma</span>
                    </div><!-- /timeline-heading -->

                    <div class="timeline-body">
                      <p>As now, I am last year student who takes Information System Major. Outside my studies, I am an amateur programmer.</p>
                    </div><!-- /timeline-body -->
                  </div> <!-- /timeline-content -->
                </div> <!-- /timeline-panel -->
              </li>
            </ul>
          </div>
        </div>
      </div><!-- /row -->
    </div><!-- /.container -->
  </section><!-- End Resume Section -->

  <!-- Skills Section -->
  <section id="skills" class="skills-section section-padding">
    <div class="container" style="padding-bottom: 10px; margin-bottom: -50px">
    	<br>
      <h2 class="section-title">Skills</h2>

      <div class="row">
        <div class="col s6">
          <div class="skill-progress">
            <div class="skill-title">PHP</div> 
            <div class="meter">
						  <span class="prog" style="width:80%"></span>
						  <p class="txtprog">80%</p>
						</div>
          </div><!-- /.skill-progress -->

          <div class="skill-progress">
            <div class="skill-title">Laravel</div> 
            <div class="meter">
						  <span class="prog" style="width:75%"></span>
						  <p class="txtprog">75%</p>
						</div>
          </div><!-- /.skill-progress -->
          <div class="skill-progress">
            <div class="skill-title">CodeIgniter</div>  
            <div class="meter">
						  <span class="prog" style="width:65%"></span>
						  <p class="txtprog">65%</p>
						</div>
          </div><!-- /.skill-progress -->
          <div class="skill-progress">
            <div class="skill-title">CSS</div>  
            <div class="meter">
						  <span class="prog" style="width:70%"></span>
						  <p class="txtprog">70%</p>
						</div>
          </div><!-- /.skill-progress -->
        </div><!-- /.col -->

        <div class="col s6">
          <div class="skill-progress">
            <div class="skill-title">HTML5</div> 
            <div class="meter">
						  <span class="prog" style="width:80%"></span>
						  <p class="txtprog">80%</p>
						</div>
          </div><!-- /.skill-progress -->

          <div class="skill-progress">
            <div class="skill-title">JavaScript</div> 
            <div class="meter">
						  <span class="prog" style="width:80%"></span>
						  <p class="txtprog">80%</p>
						</div>
          </div><!-- /.skill-progress -->
          <div class="skill-progress">
            <div class="skill-title">MySQL</div>  
            <div class="meter">
						  <span class="prog" style="width:80%"></span>
						  <p class="txtprog">80%</p>
						</div>
          </div><!-- /.skill-progress -->
          <div class="skill-progress">
            <div class="skill-title">PostgreSQL</div>  
            <div class="meter">
						  <span class="prog" style="width:70%"></span>
						  <p class="txtprog">70%</p>
						</div>
          </div><!-- /.skill-progress -->
        </div><!-- /.col -->

    </div><!-- /.container -->
  </section><!-- End Skills Section -->
@endsection

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			var bar = $('.prog');
			// var p = $('.txtprog');

			var width = bar.attr('style');
			width = width.replace("width:", "");
			width = width.substr(0, width.length-1);


			var interval;
			var start = 0; 
			var end = parseInt(width);
			var current = start;

			var countUp = function() {
			  current++;
			  // p.html(current + "%");
			  
			  if (current === end) {
			    clearInterval(interval);
			  }
			};

			interval = setInterval(countUp, (1000 / (end + 1)));
		});

	</script>
@endpush