$(document).ready(function() {
  $(".player-edit").click(function(){
    $(this).parent().prev().html('<form class="form-group tbl-edit" action="/edit-player/' + $(this).val() + '" method="post">' +
      '<input type="hidden" name="_method" value="patch">' +
      '<input type=text name="player_name" value=' + $(this).parent().prev().text() + '>' +
      '<button type="submit" class="btn btn-xs btn-info" name="player-button">Submit Edit</button>' +
      '<button type="button" class="btn btn-xs btn-danger player-cancel" name="player-cancel">Cancel Edit</button>' +
    '</form>');
    
    $(".player-cancel").click(function(){
      $(this).parent().html("<p>" + $(this).prev().prev().val() + "</p>");
    });
  });
  
  $(".client-edit").click(function(){
    $(this).parent().prev().html('<form class="form-group tbl-edit" action="/edit-client/' + $(this).val() + '" method="post">' +
      '<input type="hidden" name="_method" value="patch">' +
      '<input type=text name="client_name" value=' + $(this).parent().prev().text() + '>' +
      '<button type="submit" class="btn btn-xs btn-info" name="client-button">Submit Edit</button>' +
      '<button type="button" class="btn btn-xs btn-danger client-cancel" name="client-cancel">Cancel Edit</button>' +
    '</form>');
    
    $(".client-cancel").click(function(){
      $(this).parent().html("<p>" + $(this).prev().prev().val() + "</p>");
    });
  });
  
  
});