<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <a name="caesar-cipher" class="anchor-tag">
                <i class="fa fa-link"></i>
            </a>
            
            <span class="pull-right text-muted">
                <a href="https://github.com/tlaffoon/coderbyte/blob/master/caesar_cipher.html">
                    <i class="fa fa-github-square fa-2x"></i>
                </a>
            </span>

            <h4 class="indent underline">Caesar Cipher</h4>
            
            <p>
                A Caesar Cipher works by 
                shifting each letter in the string N places down in the alphabet (in 
                this case N will be num). Punctuation, spaces, and capitalization should remain intact. 
            </p>

            <p>
                For example if the string is "Caesar Cipher" and num is 2 the output should be "Ecguct Ekrjgt".
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('caesarCipherText', null, array('id' => 'caesarCipherText', 'class' => 'form-group form-control', 'placeholder' => 'Enter a string...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-caesarCipher', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="caesarCipherOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>