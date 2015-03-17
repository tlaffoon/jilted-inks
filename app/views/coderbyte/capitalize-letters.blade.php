<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <h4 class="indent underline">Capitalize Letters</h4>
            
            <p>
                Using the JavaScript language, have the function LetterCapitalize(str) 
                take the str parameter being passed and capitalize the first letter of 
                each word. Words will be separated by only one space.
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('capitalizeLettersInput', null, array('id' => 'capitalizeLettersInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter some words...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-capitalizeLetters', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="capitalizeLettersOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>