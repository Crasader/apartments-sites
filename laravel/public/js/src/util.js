function amcBindValidate(obj){
    $(obj.form).validate({ 'rules': obj.rules});
}
function amcMaskPhone(id,format){
    $(id).mask(format);
}
function utilValidateEmail(em){
    var regex =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return em.match(regex);
}

function utilValidateDate(d){
    if(d.length == 0){
        return {'status': false,'msg': 'No date has been entered'};
    }
    if(d.match(/[a-z]{1,}/)){
        return { 'status': false, 'msg': 'Invalid date entered'};
    }
    if(Date.now() > Date.parse(d)){
        return { 'status': false, 'msg': 'Please select a date that is in the future'};
    }
    return {'status': true, 'msg' : 'Good job :)'};
}

function _createBindCallback(json,i,varMapping,conf){
    return function(){
        console.log(varMapping);
        for(var b in varMapping){
            if(varMapping[b].static){
                $("#" + b).val(varMapping[b].static);
            }else{
                $("#" + b).val(json[i][varMapping[b]]);
            }
        }
        if(conf.action.fetch){
            $("#" + conf.form).prop('action',json[i][conf.action.fetch]);
        }else{
            $("#" + conf.form).prop('action',conf.action);
        }
        $("#" + conf.form).submit();
   };
}

function utilBindSubmitterVars(json,varMapping,conf){
    for(var i in json){
        console.log(json);
        $("#" + i).bind("click",_createBindCallback(json,i,varMapping,conf));
    }
}

function focusAlert(id,friendly_id,custom_msg){
	if(custom_msg){
		alert(custom_msg);
	}else{
		alert("Please enter a " + friendly_id);
	}
	$("#" + id).trigger("focus");
	$("#" + id).parent().addClass('has-error');
	$("#" + id).bind('blur',function(){
		if(id == 'email'){
			if(utilValidateEmail($(this).val())){
				$(this).parent().removeClass('has-error');
			}
			return;
		}
		if($(this).val().length > 0){
			$(this).parent().removeClass('has-error');
		}
	});
	event.preventDefault();
	return false;
}
