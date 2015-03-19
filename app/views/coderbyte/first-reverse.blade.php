<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="first-reverse" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/first_reverse.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">First Reverse</h4>
            
            <p>
                Using the JavaScript language, have the function FirstReverse(str)
                take the str parameter being passed and return the string in reversed 
                order. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('firstReverseInput', null, array('id' => 'firstReverseInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter a string...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-firstReverse', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="firstReverseOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>