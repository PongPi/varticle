<div id="albums-album-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Album</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_album"> 
            <div class="form-group">
              <label for="">Tiêu đề</label>
              <input ng-title="Tiêu đề" type="text" class="form-control" name="title" ng-model="album.title" placeholder="Tiêu đề" required>
            </div>
            <div class="form-group">
              <label for="">Miêu tả</label>
              <textarea ng-title="Miêu tả" rows="5" class="form-control" name="desc" ng-model="album.desc" placeholder="Miêu tả" required></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" ng-click="savealbum()" class="btn btn-primary">Lưu</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->