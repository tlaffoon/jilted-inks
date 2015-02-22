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

</style>


@section('content')

    <!-- Header / Bio -->
    <div class="row box img-rounded">
        <div class="col-md-12"> 
            <h2 class="page-header">Thomas J. Laffoon</h2>
        </div>

        <div class="col-md-3">
            <img id="headshot" src="/includes/img/headshot.png" class="img-responsive img-rounded">
        </div>

        <div class="col-md-9 img-rounded dash-border">
            <h4>Biographical Information</h4>
            <p class="description"> My name is Thomas J. Laffoon - and I work in a startup here in downtown San Antonio 
                called <a href="http://codeup.com/"><strong>Codeup</strong></a>.  We teach people how to build websites and web applications using 
                some of the most common technologies out there.
            </p>
            <p class="description">
                We use the LNMP (Linux/Nginx/MySQL/PHP) stack in our curriculum, along with Javascript 
                and jQuery - focusing on real-world applications of object-oriented programming.
                We also teach them how to use Laravel, the MVC framework for PHP.  
            </p>
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
                <img src="/includes/img/linux.png" class="img img-responsive img-rounded">
            </div>

            <div class="col-md-2">
                <a href="" target="_blank"></a>
                <img src="/includes/img/ubuntu.png" class="img img-responsive img-rounded">
            </div>
        </div>
    </div>

    <!-- Work History -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">Work History</h3>
        </div>

        <div class="col-md-12">

            <div class="text-muted pull-right">February 2014 - Current</div>

            <h4 class="codeup">Codeup Full-Stack Web Development Bootcamp</h4>

            <p class="description">Codeup Bootcamp is a 4-month, in-person program that turns non-techies 
            into entry level Software Engineers focused on Web Development using a 
            unique, instructor-led and immersive approach.</p>
        </div>
        
        <div class="col-md-7">
            <p>As a <strong>Junior Instructor</strong>, my duties included: </p>
            <ul>
                <li>Planning daily lessons;</li>
                <li>Leading lectures and class exercises;</li>
                <li>Writing curriculum;</li>
                <li>Writing homework assignments;</li>
                <li>Performing one-on-one student code reviews;</li>
                <li>Managing student teams during final capstone projects;</li>
                <li>Assisting with troubleshooting in all aspects of the course.</li>
            </ul>
        </div>

        <div class="col-md-3 col-md-offset-2">
            <a href="http://codeup.com/" target="_blank">
                <img src="/includes/img/codeup-logo.jpg" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-12">
            <div class="text-muted pull-right">February 2010 - February 2013</div>

            <h4>Rackspace - The Open Cloud Company</h4>
        </div>
        
        <div class="col-md-2">
            <a href="http://codeup.com/" target="_blank">
                <img src="/includes/img/rackspace.png" class="img-responsive img-rounded">
            </a>
        </div>

        <div class="col-md-10">
            <p>As a <strong>Linux Systems Administrator</strong>, my duties included: </p>
            <ul>
                <li>Installing, configuring, updating and troubleshooting services for customers such as OS 
                    level concerns, web server, database server, applications server and mail; 
                    including Apache, MySQL, PHP, FTP, SSH and DNS;</li>
                <li>Teaching customers “how to fish” while advising on technical issues;</li>
                <li>Collaborating with fellow system administrators and support team members;</li>
                <li>Troubleshooting customer websites to resolve issues with code or environmental configurations;</li>
                <li>Providing Fanatical Support® in all interactions.</li>
            </ul>
        </div>
    </div>

    <!-- Education -->
    <div class="row box img-rounded">
        <div class="col-md-12">
            <h3 class="page-header">Education</h3>
            <p class="text-muted pull-right">December 2008</p>
        </div>

        <div class="col-md-10"> 
            <p>Bachelor Of Arts in Psychology/Anthropology</p>
        </div>

        <div class="col-md-2">
            <img src="/includes/img/utsa.jpg" class="img-responsive img-rounded">
        </div>
    </div>

@stop
