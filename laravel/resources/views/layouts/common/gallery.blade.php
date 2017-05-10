<link rel="stylesheet" href="/js/src/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
<script src="/js/src/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  function displaySave(){
    console.log("Save changes?");
  }
  window.buttonSave = function(elementParent){
    var text = elementParent.find("input.input-save");
    var img = elementParent.parent().parent();
    $.ajax({
      data: {
        'mode': 'save',
        'section': 'gallery',
        'title': text.find('input.input-save').val(),
        'desc': text.next().find('input.input-save').val(),
        'img': img.attr('src')
      }
    })
  }
  $('#work-grid li').each(function(a,b,c){
    var hiddenSave = '<input type=hidden class="input-save">';
    $(this).addClass('ui-state-default');
    $(this).draggable({
			connectToSortable: "#work-grid",
		    revert: "invalid",
        stop: displaySave
    });
    var img = $(this).find("a.mfp-image");
    var title = img.find("h3.work-title");
    var desc = img.find("div.work-descr");
    title.html(title.html() + " <button class='edit-title'>edit</button>" + hiddenSave);
    desc.html(desc.html() + " <button class='edit-desc'>edit</button>" + hiddenSave);
    img.removeClass('mfp-image');
  });
  $("#work-grid").sortable().
    disableSelection();
  $("button.edit-title").each(function(){
    $(this).click(function(){
      var val = $(this).parent().text().replace(/edit$/,'');
      $(this).parent().html(
        "<input type='text' class='display-edit-save' value='" + val + "'>" +
          "<button onClick='buttonSave($(this).parent())'>save</button>"
      );
      $(this).parent().find("input.display-edit-save").bind('change',funcjtion(a){
        $(this).find("input.input-save").val($(this).val());
      });
    });
  });
  $("button.edit-save").click(buttonSave);
});
</script>
