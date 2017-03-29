$(document).ready(function(){
    $('#myiframe').iFrameResize({
        autoResize: true,
        enablePublicMethods: false,
        sizeWidth: false,
        heightCalculationMethod: 'bodyScroll'
    });
});