$(document).ready(function() {
                
});
(function ($) {
  $(function(){
    if($('div').is('#sidenav_vnu20')){sidenav_vnu20();}
  })
})(jQuery);


function sidenav_vnu20 () {
  $('#sidenav_vnu20 .nav>li.vnu20_sup').click(function () {
    if($(this).is('.vnu20_sup')){
      if($(this).is('.active')){
        $('#sidenav_vnu20 .nav>li.vnu20_sup').removeClass('active');
      }else{
        $('#sidenav_vnu20 .nav>li.vnu20_sup').removeClass('active');
        $(this).addClass('active');
      }
    }
    return false;
  });
}
var url_base = "";// "index.php?r=";
var app = angular.module("vnu20",['ngSanitize','ngRoute', 'ngCkeditor', 'ngAnimate', 'angularFileUpload']).config(function($httpProvider) {
  $httpProvider.defaults.headers.put['Content-Type'] ='application/x-www-form-urlencoded';
  $httpProvider.defaults.headers.post['Content-Type'] ='application/x-www-form-urlencoded';
});

function mainController($scope,$http,$location,$filter) {
  var location = $location.absUrl().split('admin');
  var url = location[0].split($location.protocol()+'://'+$location.host());
  url_base = url[1];
  console.log(url_base);
  loading('hide');  
  $('.modal').each(function () {
    var id = $(this).attr('id');
    $('#'+id).modal({
      backdrop: 'static',
      show: false,
    });
  });
    
}
