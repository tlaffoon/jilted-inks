<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <h4 class="indent underline">First Factorial</h4>
            
            <p> Using the JavaScript language, have the function FirstFactorial(num) take the num 
            parameter being passed and return the factorial of it (ie. if num = 4, return 
            (4 * 3 * 2 * 1)). </p>

            <p>For the test cases, the range will be between 1 and 18. </p>

            <p>For reference, a factorial is the product of an integer and all the integers below it; 
                e.g., factorial four ( 4! ) is equal to 24.</p>

            <div class="row">

                <div class="col-md-3">
                    {{ Form::open() }}
                    {{ Form::text('firstFactorialInput', null, array('id' => 'firstFactorialInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter an integer...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-firstFactorial', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

                <div class="col-md-8">
                    <div id="firstFactorialOutput" class="stringOutput"></div>
                </div>

            </div>
        </div>

    </div>    
</div>