@extends('layouts.awesome')

@section('css')
<style type="text/css">
    
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

    .stringOutput {
        text-indent: 10px;
        font-size: 24px;
        color: #4582ec;
    }

    ul li {
        list-style-type: none;
    }

    #main-nav-list {
        padding-top: 20px;
        position: fixed;
        right: 10px;
    }

    .nav-list-header {
        font-size: 16px;
    }

    .main-nav-list-items {
        font-size: 14px;
    }

</style>
@stop

@section('topscript')
@stop

@section('content')

@include('partials.affixed-nav-list')

<h2 class="page-header">CoderByte Challenges</h2>

{{-- Capitalize Letters --}}
@include('coderbyte.capitalize-letters')

{{-- First Factorial --}}
@include('coderbyte.first-factorial')

{{-- Array Addition --}}
@include('coderbyte.array-addition')

{{-- Caesar Cipher --}}
@include('coderbyte.caesar-cipher')

@stop

@section('bottomscript')

<script src="/includes/coderbyte/first_factorial.js"></script>
<script src="/includes/coderbyte/caesar_cipher.js"></script>
<script src="/includes/coderbyte/array_addition.js"></script>
<script src="/includes/coderbyte/capitalize_letters.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        
        // Indent paragraphs
        $("p").addClass("indent");
    
    });

</script>
@stop