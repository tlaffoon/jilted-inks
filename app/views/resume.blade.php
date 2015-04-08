@extends('layouts.awesome')

@section('css')
<style type="text/css">
    #headshot {
        border: solid #eee 1px;
    }

    .logo-row {
        padding: 10px;
    }

    .description {
        text-indent: 15px;
    }

    .box {
        border: solid #eee 1px;
        margin-top: 15px;
    }

    .job-box {
        margin-top: 20px;
    }

    #github-link {
        position: relative;
        top: 10px;
    }
</style>
@stop


@section('content')

<div class="col-md-10 col-md-offset-1">

    <!-- Header / Bio -->
    <div class="row box img-rounded">
        <div class="col-md-12"> 
            <a id="github-link" href="http://github.com/tlaffoon/" class="pull-right"><i class="fa fa-github-square fa-2x"></i></a>
            <h2 class="page-header">Thomas J. Laffoon</h2>
        </div>


        <div class="col-md-3">
            <img id="headshot" src="/includes/img/headshot.png" class="img-responsive img-rounded">
        </div>

        <div class="col-md-9 img-rounded dash-border">
            <h4>Introduction</h4>
            <p class="description"> My name is Thomas J. Laffoon - and I work in a startup here in downtown San Antonio 
                called <a href="http://codeup.com/" target="_blank"><strong>Codeup</strong></a>.  We teach people how to build websites and web applications using 
                some of the most common technologies out there.
            </p>
            <p class="description">
                We use the LNMP (Linux/Nginx/MySQL/PHP) stack in our curriculum, along with Javascript 
                and jQuery - focusing on real-world applications of object-oriented programming.
                We also teach them how to use Laravel, the MVC framework for PHP.  
            </p>
        </div>
    </div>

    <!-- Biographical Information -->
    {{-- <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">
                Biographical Information <i class="fa fa-heart-o pull-right"></i>
            </h3>

            <p class="description">
                Both of my undergraduate fields of study have helped me greatly in performing 
                duties related to the classroom.  I have a talent for anticipating 
                students' needs, accommodating different learning styles, and 
                improvising where necessary to maximize the overall bootcamp experience.
            </p>

            <p class="description">
                Working at Rackspace allowed me to apply the lessons learned from an educational 
                background in humanities towards a technical career.  While there, I mastered the 
                delicate art of customer support and learned how to navigate all sorts of various
                technological and psychological quagmires.
            </p>

            <p class="description">
                All of these learning opportunities coalesced together into a beautiful singularity
                when I discovered the distinct pleasure of teaching at Codeup.  The daily challenges
                involved in that role are those for which I am well-suited.  Learning new material; 
                breaking that knowledge down into manageable chunks to teach students; keeping them
                focused and motivated during times when frustrations and new concepts seem insurmountable...
                these are the most recent skills I've acquired and I am very proud of them.
            </p>
        </div>
    </div> --}}

    <!-- Work History -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">Work History</h3>
        </div>

        {{-- Codeup --}}
        <div class="col-md-12 job-box">
            <div class="text-muted pull-right">February 2014 - Current</div>
            
                <h4 class="codeup">Codeup Full-Stack Web Development Bootcamp</h4>

                <p class="description">Codeup Bootcamp is a 4-month, in-person program that turns non-techies 
                into entry level Software Engineers focused on Web Development using a 
                unique, instructor-led and immersive approach.</p>
        </div>
        
        <div class="col-md-3">
            <a href="http://codeup.com/" target="_blank">
                <img src="/includes/img/codeup-logo.jpg" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-9">
            <p>As a <strong>Junior Instructor</strong>, my duties included: </p>
            <ul>
                <li>Planning daily lessons;</li>
                <li>Leading lectures and class exercises;</li>
                <li>Writing/updating/maintaining curriculum;</li>
                <li>Improvising extra-credit homework assignments;</li>
                <li>Performing one-on-one student code reviews;</li>
                <li>Managing student teams during final capstone projects;</li>
                <li>Assisting with troubleshooting in all aspects of the course.</li>
            </ul>
        </div>


        {{-- Linux Admin --}}
        <div class="col-md-12 job-box">
            <div class="text-muted pull-right">September 2012 - February 2013</div>
                <h4>Rackspace - Enterprise Linux Systems Administration</h4>
        </div>
        
        <div class="col-md-3">
            <a href="http://rackspace.com/" target="_blank">
                <img src="/includes/img/rackspace_logo.jpg" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-9">
            <p>As a <strong>Enterprise Linux Systems Administrator</strong>, my duties included: </p>
            <ul>
                <li>Installing, configuring, updating and troubleshooting services for customers such as OS 
                    level concerns, web server, database server, applications server and mail; 
                    including Apache, MySQL, PHP, FTP, SSH and DNS;</li>
                <li>Teaching customers “how to fish” while advising on technical issues;</li>
                <li>Collaborating with fellow system administrators and support team members;</li>
                <li>Providing Fanatical Support<sup>®</sup> in all interactions.</li>
            </ul>
        </div>

        {{-- CloudSites --}}
        <div class="col-md-12 job-box">
            <div class="text-muted pull-right">September 2010 - September 2012</div>
                <h4>Rackspace - CloudSites Technical Support</h4>
        </div>
        
        <div class="col-md-3">
            <a href="http://rackspace.com/" target="_blank">
                <img src="/includes/img/cloudsites_logo.png" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-9">
            <p>As a <strong>Rackspace Cloudsites Systems Administrator</strong>, my duties included: </p>
            <ul>
                <li>Providing front-line customer support for the Rackspace CloudSites products;</li>
                <li>Troubleshooting technical configurations in a hybrid cloud hosting environment (PHP/ASP/.NET + MYSQL/MSSQL + DNS/FTP);</li>
                <li>Collaborating with fellow support team members and systems operations;</li>
                <li>Training new support personnel;</li>
                <li>Writing tools for support/operations;</li>
                <li>Providing Fanatical Support<sup>®</sup> in all interactions.</li>
            </ul>
        </div>

        {{-- Rackspace Monitoring --}}
        <div class="col-md-12 job-box">
            <div class="text-muted pull-right">February 2010 - September 2010</div>
                <h4>Rackspace - Intensive Monitoring Team</h4>
        </div>
        
        <div class="col-md-3">
            <a href="http://rackspace.com/" target="_blank">
                <img src="/includes/img/rackspace_logo.jpg" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-9">
            <p>As an <strong>Enterprise Monitoring Technician</strong>, my duties included: </p>
            <ul>
                <li>Configuring interactive monitoring solutions for production environments;</li>
                <li>Debugging/troubleshooting/resolving generated alerts within 15 minute SLA;</li>
                <li>Serving as the primary means of communication to customers;</li>
                <li>Escalating issues which needed additional Rackspace support to resolve;</li>
                <li>Providing Fanatical Support<sup>®</sup> in all interactions.</li>
            </ul>
        </div>

    </div>

    <!-- Education -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">Education</h3>
        </div>

        <div class="col-md-10"> 
            <p class="text-muted pull-right">December 2008 - 3.2 GPA</p>
            <h4>Dual B.A. Psychology/Anthropology</h4>

            <p class="description">
                <em>
                    Mastered communication skills and studied the ability to collect,
                organize, analyze and interpret data with an evolved understanding of human 
                behavior.
                </em>
            </p>
            <p class="description">
                <em>
                    Anthropology is the scientific and humanistic study of humankind. 
                    It provides a fuller understanding of both other cultures and our own. 
                </em>
            </p>
        </div>

        <div class="col-md-2">
            <img src="/includes/img/utsa.jpg" class="img-responsive img-rounded">
        </div>
    </div>

    <!-- Technical Skills -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">Technical Skills</h3>
        </div>

        <!-- Logo Row -->
        <div class="row logo-row">
            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/bootstrap.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/html5_css3.png" class="img img-responsive img-rounded">
            </div>
            
            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/php.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/javascript.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/jquery.gif" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/laravel.png" class="img img-responsive img-rounded">
            </div>
        </div>

        <!-- Logo Row -->
        <div class="row logo-row">
            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/vagrant.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/ansible.png" class="img img-responsive img-rounded">
            </div>
            
            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/mysql.jpg" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/git.jpg" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/ubuntu.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/wordpress_logo.png" class="img img-responsive img-rounded">
            </div>
        </div>
    </div>

    <!-- Placeholder -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h4>
                Letters of Recommendation/References available upon request.
            </h4>
        </div>
    </div>
</div>
@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function() {

        $('.box').hide();
        $('.box').fadeDelay();

    });
</script>
@stop
