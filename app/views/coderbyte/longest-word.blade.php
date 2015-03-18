<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="longest-word" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/longest_word.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Longest Word</h4>
            
            <p> 
                Using the JavaScript language, have the function LongestWord(sentence) 
                take the "sentence" parameter being passed and return the largest word 
                in the string. 
            </p>

            <p> 
                If there are two or more words that are the same length, return 
                the first word from the string with that length. Ignore punctuation 
                and assume "sentence" will not be empty. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('longestWordInput', null, array('id' => 'longestWordInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter some words...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-longestWord', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="longestWordOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>