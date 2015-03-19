@extends('layouts.awesome')

@section('css')
<style type="text/css">
    ol>li {
        margin-bottom: 10px;
    }

    ol {
        list-style-type: none;
    }

    ul  {
        list-style-type: none;
    }

    .curriculum-block {
        padding: 10px;
        border: solid #eee 1px;
        margin-bottom: 20px;
    }

    body {
        margin-bottom: 800px;
    }

    #main-nav-list {
        position: fixed;
        top: 80px;
        right: 50px;
    }

    .header1 {
        padding-top: 20px;
    }
</style>

@stop

@section('topscript')
@stop

@section('content')

<div class="col-md-10">

    <h2 class="page-header">Functions</h2>

    {{-- Nav List --}}
    @include('partials.curriculum-nav-list')

    {{-- Why --}}
    @include('curriculum.why')

    {{-- Anatomy --}}
    @include('curriculum.anatomy')

    {{-- Naming Conventions --}}
    @include('curriculum.naming-conventions')

    {{-- Yin & Yang --}}
    @include('curriculum.yin-yang')

    {{-- Params --}}
    @include('curriculum.params')

    {{-- Scope --}}
    @include('curriculum.scope')

</div>
@stop

@section('bottomscript')

<script type="text/javascript">

$("p").addClass("indent");

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
</script>

@stop