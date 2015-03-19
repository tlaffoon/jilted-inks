<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">

            <a name="alphabet-soup" class="anchor-tag"></a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/alphabet_soup.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Alphabet Soup</h4>
            
            <p>
                Using the JavaScript language, have the function AlphabetSoup(str)
                take the str string parameter being passed and return the string 
                with the letters in alphabetical order (ie. hello becomes ehllo). 
            </p>
                
            <p>
                Assume numbers and punctuation symbols will not be included in the string. 
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('alphabetSoupInput', null, array('id' => 'alphabetSoupInput', 'class' => 'form-group form-control', 'placeholder' => 'Enter a sentence...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-alphabetSoup', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="alphabetSoupOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>