<div id="article-post-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="post-modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="post-modal-title">Bài viết</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_post">           
            <div class="form-group">
              <label for="">Tiêu đề</label>
              <input ng-title="Tiêu đề" type="text" class="form-control" name="post_title" ng-model="post.post_title" placeholder="Tiêu đề" required>
            </div>
            <div class="form-group">
              <label for="">Danh mục</label>
              <select ng-title="Danh mục" class="form-control" ng-model="postcat"  ng-options="options.cat_name for options in allcatalogue | filter:{ cat_status : 1 }" required>
                <!-- <option value="">-- Danh mục --</option> -->
              </select>
            </div>
            <div class="form-group">
              <label for="">Loại</label>        
              <select ng-title="Loại" class="form-control" name="posttype" ng-model="posttype"  ng-options="options.name for options in alltype" required>
                <!-- <option value="">-- Danh mục --</option> -->
              </select>
            </div>
            <div class="form-group">
              <label for="">Miêu tả</label>
              <textarea ng-title="Miêu tả" rows="5" class="form-control" name="post_desc" ng-model="post.post_desc" placeholder="Miêu tả" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Nội dung</label>
              <textarea ng-title="Nội dung" ckeditor="editorOptions" rows="5" class="form-control" name="post_content" ng-model="post.post_content" placeholder="Nội dung" required></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" ng-click="savepost()" class="btn btn-primary">Lưu</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->