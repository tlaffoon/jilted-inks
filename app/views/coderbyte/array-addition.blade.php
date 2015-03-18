<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <a name="array-addition" class="anchor-tag">
                <i class="fa fa-link"></i>
            </a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/blob/master/array_addition.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Array Addition</h4>
            
            <p>
                Using the JavaScript language, have the function ArrayAdditionI(arr) 
                take the array of numbers stored in arr and return the string true if 
                any combination of numbers in the array can be added up to equal the 
                largest number in the array, otherwise return the string false. 
            </p>
            <p>
                For example: if arr contains [4, 6, 23, 10, 1, 3] the output should 
                return true because 4 + 6 + 10 + 3 = 23. The array will not be empty, 
                will not contain the same elements, and may contain negative numbers. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('arrayAdditionInput', null, array('id' => 'arrayAdditionInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter a few integers separated by whitespace...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-arrayAddition', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="arrayAdditionOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>