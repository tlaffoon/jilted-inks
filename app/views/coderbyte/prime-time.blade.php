<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="prime-time" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/intermediate/prime_time.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Prime Time</h4>
            
            <p>
                Using the JavaScript language, have the function PrimeTime(num) take the num parameter being passed and return the string true if the parameter is a prime number, otherwise return the string false. The range will be between 1 and 2^16. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('primeTimeInput', null, array('id' => 'primeTimeInput', 'class' => 'form-group form-control', 'placeholder' => 'Please enter an integer.')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-primeTime', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="primeTimeOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>