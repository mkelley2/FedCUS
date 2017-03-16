$(document).ready(function() {
  $(".player-edit").click(function(){
    $(this).parent().prev().html('<form class="form-group tbl-edit" action="/edit-player/' + $(this).val() + '" method="post">' +
      '<input type="hidden" name="_method" value="patch">' +
      '<input type="text" name="player_name" value=' + $(this).parent().prev().text() + '>' +
      '<button type="submit" class="btn btn-xs btn-info" name="player-button">Submit Edit</button>' +
      '<button type="button" class="btn btn-xs btn-danger player-cancel" name="player-cancel">Cancel Edit</button>' +
    '</form>');
    
    $(".player-cancel").click(function(){
      $(this).parent().html("<p>" + $(this).prev().prev().val() + "</p>");
    });
  });
  
  $(".buy-edit").click(function(){
    var num = $(this).parent().prev().prev().prev().text();
    var name = $(this).parent().prev().prev().text();
    var count = $(this).parent().prev().text();
    var id = $(this).val();
    $(this).parent().parent().html(
      '<td colspan="4">'+
      '<form class="form-group tbl-edit" action="/edit-buy/' + id + '" method="post">' +
        '<input type="hidden" name="_method" value="patch">' +
        // '<td>' +
        num + 
        // '</td>' +
        // '<td>' +
          '<input type="text" name="buy_name" value=' + name + '>' +
        // '</td>' + 
        // '<td class="al_right">' +
          '<input type="number" name="buy_count" value=' + count + '>' +
        // '</td>' + 
        // '<td class="al_right">' +
        '<button type="submit" class="btn btn-xs btn-info float-btn" name="buy-button">Submit Edit</button>' +
        '<button type="button" class="btn btn-xs btn-danger buy-cancel float-btn" name="buy-cancel">Cancel Edit</button>' +
        '</td>' + 
      '</form>'
    );
    
    $(".buy-cancel").click(function(){
      $(this).parent().parent().html(
          '<td class="count-col">' + num + '</td>' +
          '<td>' + name + '</td>' +
          '<td class="al_right">' + count + '</td>' +
          '<td class="button-col">' +
            '<button type="button" class="btn btn-xs btn-info buy-edit" value="' + id + '">Edit</button>' +
            '<form class="form-group tbl-del" action="/delete-buy-item/' + id + '" method="post">' +
              '<input type="hidden" name="_method" value="delete">' +
              '<button type="submit" class="btn btn-xs btn-danger" name="button">Remove</button>' +
            '</form>' +
          '</td>'
      );
    });
  });
  
  $(".sell-edit").click(function(){
    $(this).parent().prev().html('<form class="form-group tbl-edit" action="/edit-sell/' + $(this).val() + '" method="post">' +
      '<input type="hidden" name="_method" value="patch">' +
      '<input type="number" name="sell_name" value=' + $(this).parent().prev().text() + '>' +
      '<button type="submit" class="btn btn-xs btn-info" name="sell-button">Submit Edit</button>' +
      '<button type="button" class="btn btn-xs btn-danger sell-cancel" name="sell-cancel">Cancel Edit</button>' +
    '</form>');
    
    $(".sell-cancel").click(function(){
      $(this).parent().html("<p>" + $(this).prev().prev().val() + "</p>");
    });
  });
  
  $(".header-row").click(function(){
    $(this).next().toggle();
  });
});