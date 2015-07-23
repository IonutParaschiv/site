var ajax = {

post : function(args){
    var response = 'no response';
    $.ajax({
      type: "POST",
      url: "inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        response = data;
      },
    });
    return response;
}



}//ajax end
//=========================================================================


var user = {



login: function(){
    var args = $('#loginForm').serialize();
    $.ajax({
      type: "POST",
      url: "inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data)
        if(!data.success){
            feedback.alert('.userfeedback_login', data.message);
            return false
        }else{
            location.reload();
        }
      },
    });
},
logout: function(){
    $.ajax({

        type: "POST",
        url: "/bachelor/site/inc/lib/php/RequestHandler.php",
        data: "method=logout" ,
        success: function(data){
              window.location.href = "/bachelor/site";
        },
      });
  },

register: function(){
    var args = $("#registerForm").serialize();
    $.ajax({
      type: "POST",
      url: "inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        if(!data.success){
            feedback.alert('.userfeedback_reg', data.message);
            return false
        }
        $("#registerForm").hide();
        feedback.success('.userfeedback_reg', 'Your account has been created');
      },
    });
},

edit: function(){
    var args = "method=editAccount&"+$("#editAccountForm").serialize();
    $.ajax({
      type: "POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
      },
    });
}

}

var company = {

  create: function(){

    var args = "method=createCompany&"+$('#companyCreateForm').serialize();
    $.ajax({
      type: "POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data)
        if(!data.success){
          feedback.alert('.userfeedback_company_create'. data.message);
        }else{
          $('#companyCreateForm').hide();
          feedback.success('.userfeedback_company_create', 'Your company has been created');
          company.getAll();
        }
      }
    })
  },
  edit: function(){
    if(confirm('Your company will be edited. \n Proceed?')){
        var args = "method=editCompany&"+$('#companyEditForm').serialize();
        $.ajax({
          type: 'POST',
          url: "/bachelor/site/inc/lib/php/RequestHandler.php",
          data: args,
          success: function(data){
            data = JSON.parse(data);
            if(data.success){
              var company = JSON.parse(data.data);
              if(company != undefined && company.length !=0){
                for(var i = 0; i<company.length; i++){
                  $('#companyEditForm #name').val(company[i].name);
                  $('#companyEditForm #email').val(company[i].email);
                  $('#companyEditForm #address').val(company[i].address);
                  $('#companyEditForm #openingH').val(company[i].opening_h);
                }
              }
            }
          }
        })

    }
      
  },
  delete: function(){
    if(confirm('Your company will be deleted. \n Proceed?')){
      var args = "method=deleteCompany&companyId="+$('#companyEditForm #availableCompaniesSelect').val();
      $.ajax({
        type: 'POST',
        url: "/bachelor/site/inc/lib/php/RequestHandler.php",
        data: args,
        success: function(data){
          if(data){
            company.getAll();
          }
          
        }
      })
    }
  },
  get: function(){
    var id = $('#availableCompaniesSelect').val();
    if(id == 0){
      $('.companyControlBtn').hide();
    }else{
      $('.companyControlBtn').show();
    }
    var args = "method=getSingleCompany&companyid="+id
    $.ajax({
      type: "POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        if(data.success){
          var company = JSON.parse(data.data);
          if(company != undefined && company.length !=0){
            for(var i = 0; i<company.length; i++){
              $('#companyEditForm #name').val(company[i].name);
              $('#companyEditForm #email').val(company[i].email);
              $('#companyEditForm #address').val(company[i].address);
              $('#companyEditForm #openingH').val(company[i].opening_h);
            }
          }
        }
      }
    })
  },
  getAll: function(){
    var args = "method=getAllCompanies";

    $.ajax({
      type:"POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        if(data.success){
          var companies = JSON.parse(data.data)
          var html = '<option value="0">Nothing selected</option>';
          if (companies != undefined && companies.length != 0) {
                for(var i = 0; i<companies.length; i++){
                  html += '<option value="'+companies[i].id+'">'+companies[i].name+'</option>'
                }
                $('.availableCompaniesSelect').empty();
                $('.availableCompaniesSelect').append(html);
            }
          
        }
      }
    });
  }


};
var staff = {
  
  create: function(){
    var companyId = $('#availableCompaniesStaffSelect').val();
    var args = "method=createStaff&companyId="+companyId+'&'+$('#staffCreateForm').serialize();
    console.log(args);
    $.ajax({
      type: "POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        console.dir(data);
        if(!data.success){
          feedback.alert('.userfeedback_staff_create', data.message);
        }else{
          $('#serviceCreateForm').hide();
          feedback.success('.userfeedback_staff_create', 'Your staff member has been created');

        }
      }
    })
  },
};
var service = {

  create: function(){
    var companyId = $('#availableCompaniesServiceSelect').val();
    var args = "method=createService&companyId="+companyId+'&'+$('#serviceCreateForm').serialize();
    console.log(args);
    $.ajax({
      type: "POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        console.dir(data);
        if(!data.success){
          feedback.alert('.userfeedback_service_create', data.message);
        }else{
          $('#serviceCreateForm').hide();
          feedback.success('.userfeedback_service_create', 'Your service has been created');

        }
      }
    })
  },


  delete: function(){
    console.log('delete');
  },


  edit: function(){
    console.log('edit');
  },

  getAll: function(id){

    var companyId = $('#'+id).val();
    var args = "method=getAllServices&company_id="+companyId;
    $.ajax({
      type:"POST",
      url: "/bachelor/site/inc/lib/php/RequestHandler.php",
      data: args,
      success: function(data){
        data = JSON.parse(data);
        if(data.success){
          var services = JSON.parse(data.data);
          var html = '';
          var checkboxes = '';
          for(var i = 0; i< services.length; i++){
            html = html + '<li> <a href="#">'+services[i].name+'</a> </li>';
            checkboxes =checkboxes + '<div class="checkbox"><label><input type="checkbox" name="services[]" value="'+services[i].id+'">'+services[i].name+'</label></div>';

          }
          $('#servicesList').html(html);
          $('#availableServices').html(checkboxes);
          console.dir(services);
                    
        }
      }
    });
  },


  get: function(){
    console.log('get single');
  }



}
$(document).ready(function(){

});

//==========================================================================
var feedback = {

alert: function(target, message){
    $(target).html('<div class="alert alert-warning" role="alert">'+message+'</div>');
},
success: function(target, message){
    $(target).html('<div class="alert alert-success" role="alert">'+message+'</div>');
}

}














