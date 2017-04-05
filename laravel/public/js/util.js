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
