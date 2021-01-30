$(document).ready(function(){
  $(".delete").click(function(){
    if (!confirm("Do you want to delete this item?")){
      return false;
    }
  });
});

$(document).ready(function(){
  $(".update").click(function(){
    if (!confirm("Do you want to update this item?")){
      return false;
    }
  });
});

$(document).ready(function(){
  $(".insert").click(function(){
    if (!confirm("Do you want to insert this item?")){
      return false;
    }
  });
});
