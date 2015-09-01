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
    $('.createServices #duration').html(hourDropdown);
    $('.editService').removeClass('visible').addClass('hiddenForm');
    $('.createServices').removeClass('hiddenForm').addClass('visible');
  },
  editService: function(){
    $('.editService #serviceDuration').html(hourDropdown);
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
  var hours, minutes, seconds
  var option = '';
    for(var i = 0; i <= 540; i += 5){
        hours = Math.floor(i / 60);
        minutes = i % 60;
        seconds = i * 60;
        if (minutes < 10){
            minutes = '0' + minutes; // adding leading zero
            
        }
        ampm = hours % 24 < 12 ? 'AM' : 'PM';
        if (hours < 10){
            hours = "0"+hours;
        }
        console.log(seconds);
        var hm =  hours+":"+minutes;
        option = option + "<option value='"+seconds+"'>"+hm+"</option>";
     }
     return option;
}

function populate(selector) {
    var select = $(selector);
    var hours, minutes, ampm;
    for(var i = 420; i <= 1320; i += 15){
        hours = Math.floor(i / 60);
        minutes = i % 60;
        if (minutes < 10){
            minutes = '0' + minutes; // adding leading zero
        }
        ampm = hours % 24 < 12 ? 'AM' : 'PM';
        hours = hours % 12;
        if (hours === 0){
            hours = 12;
        }
        select.append($('<option></option>')
            .attr('value', i)
            .text(hours + ':' + minutes + ' ' + ampm)); 
    }
}
function getVal(selector){
  return selector.value;
}

function copyToClipboard(){
  var text = $('#widgetHtml').text();
  alert('Your code has been copied.')
  console.log(text);
}


var clip = null;
    
function $(id) { return document.getElementById(id); }
    
function init() {
  clip = new ZeroClipboard.Client();
  clip.setHandCursor( true );
  
  clip.addEventListener('load', function (client) {
    debugstr("Flash movie loaded and ready.");
  });
  
  clip.addEventListener('mouseOver', function (client) {
    // update the text on mouse over
    clip.setText( $('fe_text').value );
  });
  
  clip.addEventListener('complete', function (client, text) {
    debugstr("Copied text to clipboard: " + text );
  });
  
  clip.glue( 'd_clip_button', 'd_clip_container' );
}

function debugstr(msg) {
  var p = document.createElement('p');
  p.innerHTML = msg;
  $('d_debug').appendChild(p);
}














