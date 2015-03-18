<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="simple-adding" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/simple_adding.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Simple Adding</h4>
            
            <p>
                Using the JavaScript language, have the function SimpleAdding(num) add up all 
                the numbers from 1 to num. For the test cases, the parameter num will be any 
                number from 1 to 1000. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('simpleAddingInput', null, array('id' => 'simpleAddingInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter an integer between 1 - 1000...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-simpleAdding', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="simpleAddingOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>