<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <a name="time-convert" class="anchor-tag">
                <i class="fa fa-link"></i>
            </a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/blob/master/time_convert.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Time Convert</h4>
            
            <p>
                Using the JavaScript language, have the function TimeConvert(num) take 
                the num parameter being passed and return the number of hours and minutes 
                the parameter converts to (ie. if num = 63 then the output should be 1:3). 
                Separate the number of hours and minutes with a colon.
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('timeConvertInput', null, array('id' => 'timeConvertInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter number of minutes...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-timeConvert', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="timeConvertOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>