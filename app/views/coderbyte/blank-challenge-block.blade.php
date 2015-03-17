<div class="row">
    <div class="col-md-12">

        <div class="challenge-block img-rounded">
            
            <h4 class="indent underline">TITLE</h4>
            
            <p>
                DESCRIPTION
            </p>

            <div class="row">

                <div class="col-md-11">
                    {{ Form::open() }}
                    {{ Form::text('uniqueInput', null, array('id' => 'uniqueInput', 'class' => 'form-group form-control', 'placeholder' => 'This is placeholder text...')) }}
                </div>

                <div class="col-md-1">
                    {{ Form::submit('Submit', array('id' => 'btn-unique', 'class' => 'btn btn-default pull-right')) }}
                    {{ Form::close() }}
                </div>

            </div>

            <div id="uniqueOutput" class="stringOutput"></div>

        </div>

    </div>    
</div>