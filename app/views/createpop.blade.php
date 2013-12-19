
<!-- Modal -->
<div class="modal fade _creates" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Complete Creating...</h4>
      </div>
      <div class="modal-body">
       
        <!-- Import the right create form  -->
        @include(.'s.create')

      </div>
      <div class="modal-footer">
        <button type="button" class="btn _aqua-hover pull-left" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-info _step4" data-dismiss="modal" disabled>Create!</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
