var fill = {
    accountForm: function(id){
        var args = "method=getAccount&id="+id;
        $.ajax({
          type: "POST",
          url: "/bookrest/site/inc/lib/php/RequestHandler.php",
          data: args,
          success: function(data){
            console.log(data)
            var dataArray = JSON.parse(data);
            for(var i = 0; i<dataArray.length; i++ ){
                $('#name').val(dataArray[i].name);
                $('#surname').val(dataArray[i].surname);
                $('#email').val(dataArray[i].email);
            }
          },
        });
    }
};

var show = {
  staffCreate: function(){
      $('.editStaff').removeClass('visible').addClass('hiddenForm');
      $('.createStaff').removeClass('hiddenForm').addClass('visible');
    },
  editStaff: function(){
      $('.editStaff').removeClass('hiddenForm').addClass('visible');
  },
  serviceCreate: function(){
    $('.editService').removeClass('visible').addClass('hiddenForm');
    $('.createServices').removeClass('hiddenForm').addClass('visible');
  },
  editService: function(){
    $('.editService').removeClass('hiddenForm').addClass('visible');
  }
}

var hide = {
  staffCreate: function(){
      $('.createStaff').removeClass('visible').addClass('hiddenForm');
    },
  editStaff: function(){
      $('.editStaff').removeClass('visible').addClass('hiddenForm');
  },
  serviceCreate: function(){
    $('.createServices').removeClass('visible').addClass('hiddenForm');
  },
  editService: function(){
    $('.editService').removeClass('visible').addClass('hiddenForm');
  }
}

function getVal(selector){
  return selector.value;
}