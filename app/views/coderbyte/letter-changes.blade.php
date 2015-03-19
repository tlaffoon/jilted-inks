<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="letter-changes" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/letter_changes.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Letter Changes</h4>
            
            <p>Using the JavaScript language, have the function LetterChanges(str) take the str parameter being
            passed and modify it using the following algorithm. </p>

            <p>Replace every letter in the string with the letter
            following it in the alphabet (ie. c becomes d, z becomes a). Then capitalize every vowel in this new
            string (a, e, i, o, u) and finally return this modified string. </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('letterChangesInput', null, array('id' => 'letterChangesInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter a string...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-letterChanges', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="letterChangesOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>