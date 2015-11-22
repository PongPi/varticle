function loading(options,callback) {
	
	//console.log(options);
	$('#loading-project-container .loading-container').css({'margin-top':($(window).heigth - 106)/2});
	if(options == 'show'){		 
		$('#loading-view').fadeIn(300,function () {
		//  $('body').addClass('modal-open');
		  if (callback && typeof(callback) === "function") {  
		        callback();  
		    }  
		});		
	}else if(options == 'hide'){
		//  $('body').removeClass('modal-open');
			$('#loading-view').fadeOut(100);
			if (callback && typeof(callback) === "function") {  
		        callback();  
		    } 
	}
 
}
function comparedatetime(time) {
  	var d1 = new Date(time);
  	
	// var d2 = new Date();
	if((d2-d1)/86400000 < 1){
		if((d2-d1)/3600000 < 1){
			return parseInt((d2-d1)/60000)+ 'phút';
		}else{
			return parseInt((d2-d1)/3600000)+ 'giờ';
		}
	}else{
		return parseInt((d2-d1)/86400000)+ 'ngày';
	}
}
function mmddyyyy(time) {
  var yyyy = time.getFullYear().toString();
  var mm = (time.getMonth()+1).toString(); // getMonth() is zero-based
  var dd  = time.getDate().toString();
  return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
};
Date.prototype.customFormat = function(formatString){
    var YYYY,YY,MMMM,MMM,MM,M,DDDD,DDD,DD,D,hhh,hh,h,mm,m,ss,s,ampm,AMPM,dMod,th;
    var dateObject = this;
    YY = ((YYYY=dateObject.getFullYear())+"").slice(-2);
    MM = (M=dateObject.getMonth()+1)<10?('0'+M):M;
    MMM = (MMMM=["January","February","March","April","May","June","July","August","September","October","November","December"][M-1]).substring(0,3);
    DD = (D=dateObject.getDate())<10?('0'+D):D;
    DDD = (DDDD=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"][dateObject.getDay()]).substring(0,3);
    th=(D>=10&&D<=20)?'th':((dMod=D%10)==1)?'st':(dMod==2)?'nd':(dMod==3)?'rd':'th';
    formatString = formatString.replace("#YYYY#",YYYY).replace("#YY#",YY).replace("#MMMM#",MMMM).replace("#MMM#",MMM).replace("#MM#",MM).replace("#M#",M).replace("#DDDD#",DDDD).replace("#DDD#",DDD).replace("#DD#",DD).replace("#D#",D).replace("#th#",th);

    h=(hhh=dateObject.getHours());
    if (h==0) h=24;
    if (h>12) h-=12;
    hh = h<10?('0'+h):h;
    AMPM=(ampm=hhh<12?'am':'pm').toUpperCase();
    mm=(m=dateObject.getMinutes())<10?('0'+m):m;
    ss=(s=dateObject.getSeconds())<10?('0'+s):s;
    return formatString.replace("#hhh#",hhh).replace("#hh#",hh).replace("#h#",h).replace("#mm#",mm).replace("#m#",m).replace("#ss#",ss).replace("#s#",s).replace("#ampm#",ampm).replace("#AMPM#",AMPM);
};
app.directive('tooltips', function() {
    return function(scope, element, attrs) {
    	// console.log(element);
        element.find("a[rel=tooltip]").tooltip({html: 'true'});
    };
});
// app.directive('dropdown', function() {
    // return function(scope, element, attrs) {
        // element.find("a[data-toggle=dropdown]").dropdown('toggle');
    // };
// });
app.filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace != -1) {
                    value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    });
app.filter('comparedatetime', function () {
        return function (value, wordwise, max, tail) {
            var d1 = new Date(value);
            
            var stemp = new Date();
            var d2 = new Date(stemp.getFullYear(), stemp.getMonth(), stemp.getDate(), 0, 0, 0);
            //console.log();
            if( d1.getMonth() == d2.getMonth() && d1.getFullYear() == d2.getFullYear()){
                if((d2.getDate() - d1.getDate()) === 0 ){
                    return d1.getHours()+':'+d1.getMinutes()+ ' hôm nay';
                    
                }if((d2.getDate() - d1.getDate()) === 1){
                    return d1.getHours()+':'+d1.getMinutes()+ ' hôm qua';
                    
                }if((d2.getDate() - d1.getDate()) === -1){
                    return d1.getHours()+':'+d1.getMinutes()+ ' ngày mai';
                }else{
                    return 'ngày '+d1.getDate()+'/'+(d1.getMonth()+1);
                }
            }else if( d1.getMonth() != d2.getMonth() && d1.getFullYear() == d2.getFullYear()){{
                return 'ngày '+d1.getDate()+'/'+(d1.getMonth()+1);
            }}else{
                return d1.getDate()+'/'+(d1.getMonth()+1)+'/'+(d1.getFullYear());//'ngày '+
            }
        };
    });
app.filter('duringdate', function () {
        return function (value, wordwise, max, tail) {
            var d1 = new Date(value);
    
            var d2 = new Date();
            // if((d2-d1)/86400000 < 1){
            //     if((d2-d1)/3600000 < 1){
            //         return parseInt((d2-d1)/60000)+ 'phút';
            //     }else{
            //         return parseInt((d2-d1)/3600000)+ 'giờ';
            //     }
            // }else{
                return parseInt((d2-d1)/86400000);
            // }
        };
    });
function duringdate(value) {
            var d1 = new Date(value);
    
            var d2 = new Date();
            // if((d2-d1)/86400000 < 1){
            //     if((d2-d1)/3600000 < 1){
            //         return parseInt((d2-d1)/60000)+ 'phút';
            //     }else{
            //         return parseInt((d2-d1)/3600000)+ 'giờ';
            //     }
            // }else{
                return parseInt((d2-d1)/86400000);
            // }
        };
app.filter('dateToStringsVN', function () {
        return function (value, wordwise, max, tail) {
            var date = new Date(value);            
            // var stemp = new Date();
            return "Ngày "+ date.getDate() +" tháng "+ (date.getMonth()+1) +" năm " +date.getFullYear();
        };
    });
app.filter('right', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';
			var res = value.split(" ");        
			//console.log(res);
            if(isEmpty(res[res.length-2])){
                return res[res.length-1];
            }else{
                return res[res.length-2]+' '+res[res.length-1];
            }
            
        };
    });
app.filter('isEmpty', function () {
        return function (object) {
            if(object == '' || object == null || object == undefined || object == 'null' || object == 'undefined'){
                return true;
              }else{
                return false;
              }
        };
    });
function isEmpty(object) {
  if($.isEmptyObject(object) || object == '' || object == null || object == undefined || object == 'null' || object == 'undefined'){
  	return true;
  }else{
  	return false;
  }
}
//integer validates 
var INTEGER_REGEXP = /^\-?\d+$/;
app.directive('integer', function() {
  return {
    require: 'ngModel',
    link: function(scope, elm, attrs, ctrl) {
      ctrl.$parsers.unshift(function(viewValue) {
        if (INTEGER_REGEXP.test(viewValue)) {
          // it is valid
          ctrl.$setValidity('integer', true);
          return viewValue;
        } else {
          // it is invalid, return undefined (no model update)
          ctrl.$setValidity('integer', false);
          return undefined;
        }
      });
    }
  };
});
function simpleKeys (original) {
      return Object.keys(original).reduce(function (obj, key) {
        obj[key] = typeof original[key] === 'object' ? '{ ... }' : original[key];
        return obj;
      }, {});
    }
app.directive('ngThumb', ['$window', function($window) {
        var helper = {
            support: !!($window.FileReader && $window.CanvasRenderingContext2D),
            isFile: function(item) {
                return angular.isObject(item) && item instanceof $window.File;
            },
            isImage: function(file) {
                var type =  '|' + file.type.slice(file.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        };

        return {
            restrict: 'A',
            template: '<canvas/>',
            link: function(scope, element, attributes) {
                if (!helper.support) return;

                var params = scope.$eval(attributes.ngThumb);

                if (!helper.isFile(params.file)) return;
                if (!helper.isImage(params.file)) return;

                var canvas = element.find('canvas');
                var reader = new FileReader();

                reader.onload = onLoadFile;
                reader.readAsDataURL(params.file);

                function onLoadFile(event) {
                    var img = new Image();
                    img.onload = onLoadImage;
                    img.src = event.target.result;
                }

                function onLoadImage() {
                    var width = params.width || this.width / this.height * params.height;
                    var height = params.height || this.height / this.width * params.width;
                    canvas.attr({ width: width, height: height });
                    canvas[0].getContext('2d').drawImage(this, 0, 0, width, height);
                }
            }
        };
    }]);

function sumOptionCost(option, quantum, spinan_sl){
    var sonoidungin=1;
    if(option.measure.measureCalculation == 1) {
        sonoidungin=quantum;
    } else if (option.measure.measureCalculation == 0){
        sonoidungin=parseInt(spinan_sl)*parseInt(quantum);
    } else if (option.measure.measureCalculation == 2){
        sonoidungin=1;
    }

    option.sonoidungin=sonoidungin;     
    return sonoidungin*parseInt(option.options_gia);
};
function getSumProductCost(quantum, product, options) {
    if(product.spinan_gia != null){
        var optionCost=0;
        for(var i=0; i< options.length; i++){
            optionCost+=sumOptionCost(options[i],quantum, product.spinan_sl);
        }
       var productCost=parseInt(quantum)*parseInt(product.spinan_gia);
       return parseInt(optionCost)+parseInt(productCost);
    }else{
        var optionCost=0;
        for(var i=0; i< options.length; i++){
            optionCost+=sumOptionCost(options[i],quantum, product.spinan_sl);
        }
       return parseInt(optionCost);
    }
    
};
function getSumProductTime (quantum, product, options) {
    console.log(product);
    var optionTime= parseFloat(product.spinan_time);
    if (product.spinan_dvtime == 0 || product.spinan_dvtime == '0'){
            optionTime= (parseFloat(product.spinan_time))*24;
    }
    //(parseFloat(quantum) * 
   for(var i=0; i< options.length; i++){
        var time = parseFloat(options[i].options_time);
        if (options[i].options_dvtime == 0 || options[i].options_dvtime == '0'){
            time= parseFloat(time)*24;
        }
        optionTime+=time;
   }
   return optionTime;
};
function calculateAllOrder(itemorders, order, plus){
    var ctdhsongay = 0;
    if(plus){
        ctdhsongay = parseInt(order.ct_dh_songay);
        if(parseInt(order.ct_dh_dvtime) == 0){
            ctdhsongay = parseInt(order.ct_dh_songay)*24;
        }
    }
    var ct_dh_id = order.ct_dh_id;
    if(order.dm_tin_id.indexOf('in') == -1){
        ct_dh_id = order.ct_dh_option;
    }
    for (var x in itemorders) {
        if( parseInt(itemorders[x].ct_dh_option) == parseInt(ct_dh_id) 
            && parseInt(itemorders[x].ct_dh_id) != parseInt(ct_dh_id) 
            && parseInt(itemorders[x].ct_dh_trangthai) == 0
            ){
            if(parseInt(itemorders[x].ct_dh_dvtime) == 0){
                ctdhsongay += parseInt(itemorders[x].ct_dh_songay)*24;
            }else{
                ctdhsongay += parseInt(itemorders[x].ct_dh_songay);
            }
        }
    }
    return ctdhsongay;
}
function calculateOrderTurn(itemorders, order, turnOn) {
        var ctdhsongay = calculateAllOrder(itemorders, order, turnOn);        
        for (var i in itemorders) {
            if(itemorders[i].dm_tin_id.indexOf('in') != -1 
                    && parseInt(itemorders[i].ct_dh_id) != parseInt(order.ct_dh_id)){
                var ct_dh_songay = calculateAllOrder(itemorders, itemorders[i], (parseInt(itemorders[i].ct_dh_trangthai) == 0));
                
                if(ct_dh_songay > ctdhsongay){
                    ctdhsongay = ct_dh_songay;
                }
            }           
        }
        // if(ctdhsongay > 8){
        //     return {
        //         dh_songay:ctdhsongay/8,
        //         dh_dvtime:0,    
        //     }
        // }else{
            return {
                dh_songay:ctdhsongay,
                dh_dvtime:1,    
            }
        // }
    }

function calculateOrder(itemorders, order, status) {
    var ctdhsongay = 0;
    if(status == 0){
        // ctdhsongay = parseInt(order.ct_dh_songay);
        if(parseInt(order.ct_dh_trangthai) == 0){
            ctdhsongay = parseInt(order.ct_dh_songay);
        }
        if(parseInt(order.ct_dh_dvtime) == 0 
            
        ){
            ctdhsongay = parseInt(order.ct_dh_songay)*24;
        }
        for (var x in itemorders) {
            if(parseInt(itemorders[x].ct_dh_option) == parseInt(order.ct_dh_id)
                && parseInt(itemorders[x].ct_dh_trangthai) == 0
                ){
                if(parseInt(itemorders[x].ct_dh_dvtime) == 0){
                    ctdhsongay += parseInt(itemorders[x].ct_dh_songay)*24;
                }else{
                    ctdhsongay += parseInt(itemorders[x].ct_dh_songay);
                }
            }
        }
    }else{
        if(order.dm_tin_id.indexOf('in') == -1){
            for (var x in itemorders) {
                if(parseInt(itemorders[x].ct_dh_id) == parseInt(order.ct_dh_option) 
                    && parseInt(itemorders[x].ct_dh_id) != parseInt(order.ct_dh_id)
                    && parseInt(itemorders[x].ct_dh_trangthai) == 0
                    ){
                    if(parseInt(itemorders[x].ct_dh_dvtime) == 0){
                        ctdhsongay += parseInt(itemorders[x].ct_dh_songay)*24;
                    }else{
                        ctdhsongay += parseInt(itemorders[x].ct_dh_songay);
                    }
                }
            }
        }
    }
    
    for (var i in itemorders) {
        if(itemorders[i].dm_tin_id.indexOf('in') != -1 
                && parseInt(itemorders[i].ct_dh_id) != parseInt(order.ct_dh_id)){
            var ct_dh_songay = 0;//parseInt(itemorders[i].ct_dh_songay);
            if(parseInt(order.ct_dh_trangthai) == 0){
                ct_dh_songay = parseInt(itemorders[i].ct_dh_songay);
            }
            if(parseInt(itemorders[i].ct_dh_dvtime) == 0){
                ct_dh_songay = parseInt(itemorders[i].ct_dh_songay)*24;
            }
            for (var x in itemorders) {
                if(parseInt(itemorders[x].ct_dh_option) == parseInt(itemorders[i].ct_dh_id)
                        && parseInt(itemorders[x].ct_dh_id) != parseInt(order.ct_dh_id)
                        && parseInt(itemorders[x].ct_dh_trangthai) == 0
                    ){
                    if(parseInt(itemorders[x].ct_dh_dvtime) == 0){
                        ct_dh_songay += parseInt(itemorders[x].ct_dh_songay)*24;
                    }else{
                        ct_dh_songay += parseInt(itemorders[x].ct_dh_songay);
                    }
                }
            }
            if(ct_dh_songay > ctdhsongay){
                ctdhsongay = ct_dh_songay;
            }
        }           
    }
    // if(ctdhsongay > 8){
    //     return {
    //         dh_songay:ctdhsongay/8,
    //         dh_dvtime:0,    
    //     }
    // }else{
        return {
            dh_songay:ctdhsongay,
            dh_dvtime:1,    
        }
    // }
}
app.filter('sumByKey', function () {
    return function (data, key) {
        if (typeof (data) === 'undefined' || typeof (key) === 'undefined') {
            return 0;
        }

        var sum = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if(parseInt(data[i]['ct_dh_trangthai']) == 0){
                sum += parseInt(data[i][key]);
            }
            
        }

        return sum;
    };
})
app.filter('deliveredCost', function () {
    return function (data) {
        if (typeof (data) === 'undefined' || isEmpty(data['dh_gia_giaohang']) || isEmpty(data['dh_tongtien'])) {
            return 0;
        }
        //console.log('dh_tongtien',parseInt(data['dh_tongtien']));
        var dh_gia_giaohang = 0;
        if (!isEmpty(data['dh_gia_giaohang']) && parseInt(data['dh_gia_giaohang']) > 1 && parseInt(data['dh_tongtien']) < 1000000){
            dh_gia_giaohang = parseInt(data['dh_gia_giaohang']);
        }else if (!isEmpty(data['dh_gia_giaohang']) && parseInt(data['dh_gia_giaohang']) > 1 && parseInt(data['dh_tongtien']) > 1000000){
            if(!isEmpty(data['khachhang']['province']) && data['khachhang']['province']['provinceid'] == 79){
                dh_gia_giaohang = 0;
            }else{
                dh_gia_giaohang = parseInt(data['dh_gia_giaohang']);
            }            
        }else{
            dh_gia_giaohang = 0;
        }
        //console.log('dh_gia_giaohang',dh_gia_giaohang);
        return dh_gia_giaohang;
    };
})
function provide_validation_services (form) {   
console.log(form);    
    var allkeys = Object.keys(form);
    var model = [];
    for (var x in allkeys) {
        
        if(allkeys[x].indexOf('$') == -1){
            if(!isEmpty(form[allkeys[x]]) && form[allkeys[x]].$error.required){
                console.log(form[allkeys[x]]);
                model.push($('[ng-form="'+form.$name+'"] [name="'+allkeys[x]+'"].form-control').attr('ng-title'));
            }
            
        }
    }
    if(model.length > 0){
        var message = "Form không tiến hành submit được! Bạn vui lòng kiểm tra" 
        +" các dữ liệu sau: "+ model.join(", ") +". Trước khi submit form lần tiếp theo.";
        return {result : false, message : message};
    }else{
        return {result : true}
    }
    // return model;
};