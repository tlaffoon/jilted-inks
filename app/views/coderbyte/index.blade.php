@extends('layouts.awesome')

@section('css')
<style type="text/css">
    
    body {
        margin-bottom: 800px;
    }

    .indent {
        text-indent: 15px;
    }

    .challenge-block {
        padding: 10px;
        border: solid #eee 1px;
        margin-bottom: 20px;
    }

    .underline {
        text-decoration: underline;
    }

    .section-header {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .stringOutput {
        text-indent: 10px;
        font-size: 24px;
        color: #4582ec;
    }

    ul li {
        list-style-type: none;
    }

    ul li a {
        text-decoration: none;
    }

    #main-nav-list {
        padding-top: 20px;
        position: fixed;
        right: 80px;
    }

    .nav-list-header {
        font-size: 16px;
    }

    .main-nav-list-items {
        font-size: 14px;
    }

    .anchor-tag { 
      display: block; 
      content: " "; 
      margin-top: -80px; 
      height: 80px; 
      visibility: hidden; 
    }

</style>
@stop

@section('topscript')
@stop

@section('content')

    @include('partials.affixed-nav-list')

    <h2 class="page-header">CoderByte Challenges</h2>

    {{-- Simple --}}
    <h4 class="underline section-header">Simple</h4>

        {{-- First Reverse --}}
        @include('coderbyte.first-reverse')

        {{-- First Factorial --}}
        @include('coderbyte.first-factorial')

        {{-- Longest Word --}}
        @include('coderbyte.longest-word')

        {{-- Letter Changes --}}
        @include('coderbyte.letter-changes')

        {{-- Capitalize Letters --}}
        @include('coderbyte.capitalize-letters')

        {{-- Check Nums --}}
        @include('coderbyte.checknumbers')

        {{-- Time Convert --}}
        @include('coderbyte.time-convert')

        {{-- Array Addition --}}
        @include('coderbyte.array-addition')



    {{-- Intermediate --}}
    <h4 class="underline section-header">Intermediate</h4>

        {{-- Caesar Cipher --}}
        @include('coderbyte.caesar-cipher')


    {{-- Advanced --}}



@stop

@section('bottomscript')

{{-- Include External JS Resources --}}
<script src="/includes/coderbyte/first_reverse.js"></script>
<script src="/includes/coderbyte/first_factorial.js"></script>
<script src="/includes/coderbyte/longest_word.js"></script>
<script src="/includes/coderbyte/letter_changes.js"></script>
<script src="/includes/coderbyte/capitalize_letters.js"></script>
<script src="/includes/coderbyte/checknums.js"></script>
<script src="/includes/coderbyte/array_addition.js"></script>
<script src="/includes/coderbyte/time_convert.js"></script>

<script src="/includes/coderbyte/caesar_cipher.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        
        // Indent paragraphs
        $("p").addClass("indent");

        // On hover show anchor tag links
        // $(".title").hover(function() {
        //     console.log("triggered hover.");
        //     var anchorTag = $(this).children();
        //     anchorTag.show();
        // });

        // Provide smooth scrolling to anchor tags
        $(function() {
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 700);
                return false;
              }
            }
          });
        });
    
    });

</script>
@stop