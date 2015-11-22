<div id="article-post-avatar-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Hình đại diện</h4>
      </div>
      <div class="modal-body">
        <div nv-file-drop="" uploader="articleavatar">
        <div ng-show="post.post_img" class="thumbnail">
        <!-- <img ng-src="{{post.post_img}}" alt="{{post.post_title}}"> -->
        <img ng-show="post.post_img && post.post_img.indexOf('http://') != -1" ng-src="{{post.post_img}}" alt="{{post.post_title}}">        
        <img ng-show="post.post_img && post.post_img.indexOf('http://') == -1" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/article/{{post.post_img}}" alt="{{post.post_title}}">           
        </div>
        <div ng-show="catalogue.cat_img" class="thumbnail">
        <img ng-show="catalogue.cat_img" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/catalogue/{{catalogue.cat_img}}" alt="{{catalogue.cat_name}}">        
        </div>
          <div class="thumbnail" ng-repeat="item in articleavatar.queue">
            <div ng-show="articleavatar.isHTML5" ng-thumb="{ file: item._file, width: 558 }"></div> 
            <div class="caption">
              <h4>{{ item.file.name }}</h4>
              <p ng-show="articleavatar.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</p>
            </div>
          </div>
          <!-- <div> -->
          <div class="progress" style="">
              <div class="progress-bar" role="progressbar" ng-style="{ 'width': articleavatar.progress + '%' }"></div>
          </div>
          <!-- </div> -->
          
          </div>
        </div>
        <div class="modal-footer">         
          <!-- <div> -->
          <div ng-show="articleavatar.isHTML5" class="fileinput-button btn btn-info" nv-file-over="" uploader="articleavatar">
              Thêm File
              <input type="file" nv-file-select="" uploader="articleavatar" multiple  /><br/>
          </div>   
          <button type="button" class="btn btn-success btn-s" ng-click="articleavatar.uploadAll()" ng-hide="!articleavatar.getNotUploadedItems().length">
              <span class="glyphicon glyphicon-upload"></span> Upload
          </button>
          <button type="button" class="btn btn-warning btn-s" ng-click="articleavatar.cancelAll()" ng-hide="!articleavatar.isUploading">
              <span class="glyphicon glyphicon-ban-circle"></span> Cancel
          </button>
          <button type="button" class="btn btn-danger btn-s" ng-click="articleavatar.clearQueue()" ng-hide="!articleavatar.queue.length">
              <span class="glyphicon glyphicon-trash"></span> Remove
          </button>
          <!-- </div> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

