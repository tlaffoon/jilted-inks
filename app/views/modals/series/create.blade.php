<!-- Create Series Modal -->
<div class="modal fade" id="seriesCreateModal" tabindex="-1" role="dialog" aria-labelledby="seriesCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="seriesCreateModalLabel">Create a New Series</h4>
      </div>
      <div class="modal-body">

        {{ Form::open(array('action' => 'SeriesController@storeModal')) }}
            
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::text('description', null, array('class' => 'form-control')) }}
            </div>
            
      </div>
      <div class="modal-footer">
        {{ Form::submit('Save', array('class' => 'btn btn-default  pull-right')) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>