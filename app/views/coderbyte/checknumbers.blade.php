<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
        
            <a name="check-numbers" class="anchor-tag">
                <i class="fa fa-link"></i>
            </a>
                
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/blob/master/capitalize_letters.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Check Numbers</h4>
            
            <p>
                Using the JavaScript language, have the function CheckNums(num1,num2) 
                take both parameters being passed and return the string true if num2 
                is greater than num1, otherwise return the string false. If the parameter 
                values are equal to each other then return the string -1. 
            </p>

            <div class="row">

                
                <div class="col-md-2">
                    {{ Form::open() }}
                    {{ Form::text('checknumsInput1', null, array('id' => 'checknumsInput1', 'class' => 'form-group form-control', 'placeholder' => 'Integer 1')) }}
                </div>

                <div class="col-md-2">
                    {{ Form::text('checknumsInput2', null, array('id' => 'checknumsInput2', 'class' => 'form-group form-control', 'placeholder' => 'Integer 2')) }}
                </div>

                <div class="col-md-1 col-md-offset-1">
                    {{ Form::submit('Submit', array('id' => 'btn-checknums', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="checknumsOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>