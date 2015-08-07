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
  },
  companyCreate: function(){
    $('.createCompany').removeClass('hiddenForm').addClass('visible');
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
  },
  companyCreate: function(){
    $('.createCompany').removeClass('visible').addClass('hiddenForm');

  }
}
function hourDropdown(){
  var hours, minutes
  var option = '';
    for(var i = 0; i <= 1425; i += 5){
        hours = Math.floor(i / 60);
        minutes = i % 60;
        if (minutes < 10){
            minutes = '0' + minutes; // adding leading zero
        }
        ampm = hours % 24 < 12 ? 'AM' : 'PM';
        if (hours < 10){
            hours = "0"+hours;
        }
        var hm =  hours+":"+minutes;
        option = option + "<option value='"+hm+"'>"+hm+"</option>";
     }
     return option;
}
function getVal(selector){
  return selector.value;
}