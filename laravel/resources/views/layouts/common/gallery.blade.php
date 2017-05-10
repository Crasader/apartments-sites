<link rel="stylesheet" href="/js/src/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
<script src="/js/src/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#work-grid li').each(function(a,b,c){
    $(this).addClass('ui-state-default');
    $(this).draggable({
			connectToSortable: "#work-grid",
			revert: "invalid"
    });
    $(this).find("a.mfp-image").removeClass('mfp-image');
  });
  $("#work-grid").sortable().
    disableSelection();
});
</script>
