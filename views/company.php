<?php 
  if(!empty($_COOKIE['userSession'])){
      $cookie = json_decode(base64_decode($_COOKIE['userSession']));
      $userId = $cookie->uid;
  }else{
      header('Location:/bookrest/site');
  }
  require_once('../../site/inc/lib/php/navigation.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>BookRest</title>
    <link rel="stylesheet" href="/bookrest/site/inc/lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/site/style.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/site/subnav.css">
    <link rel="stylesheet" type="text/css" href="/bookrest/site/inc/lib/bootstrap_select/dist/css/bootstrap-select.css">
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/js/bootstrap.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/master.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/lib/bootstrap_select/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="/bookrest/site/inc/site/miscFunctions.js"></script>


</head>
<body>
<nav class='navbar navbar-inverse navbar-static-top' role= "navigation">
  <div class="main-nav container">

        <?php 
        if(empty($_COOKIE['userSession'])){
          echo $nav;
        }else{
          echo $loggedNav;
        }
        ?>
  </div>
</nav>
  <!-- <div class="wide-nav">
      <ul class='nav navbar-nav navbar-default navbar-left subnav'>
        <li><a href="/bookrest/site/views/account.php">Bookings</a></li>
        <li><a href="/bookrest/site/views/settings.php">Settings</a></li>
        <li><a href="/bookrest/site/views/company.php">Company</a></li>
        <li><a href="#">Widget</a></li>
      </ul>
  </div> -->
  <div class="stackedNav">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a data-target='companyForm' class='subnav_node' href="">Manage Company</a></li>
        <li><a data-target='staffForm' class='subnav_node' href="#">Manage Staff</a></li>
        <li><a data-target='servicesForm' class='subnav_node' href="#">Manage Services</a></li>
        <!-- <li><a href="#">Menu 3</a></li> -->
      </ul>
  </div>



<div class="container companyContainer">

<!-- COMPANY BLOCK -->
    <div class="submenu_item visible">
    <div class="form-group top_group">
          <select onchange="company.get()" class="availableCompaniesSelect" data-style="btn-primary" name="companyId" id="availableCompaniesSelect" >
            <option value="0">Nothing selected</option>
          </select>
          <button class="btn btn-wide btn-custom1 noHover" onclick="show.companyCreate();return false;">Create new company</button>
    </div>
      <script>company.getAll();</script>
      <div class="companyBlocks availableCompanies">
        <div class="userfeedback_company_edit"></div>
        <form id="companyEditForm">
            
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name"  placeholder=" Company name" value="">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email"  placeholder="Company email" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="address" name="address"  placeholder="Company address" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="openingH" name="openingH"  placeholder="Company Opening Hours"></textarea>
            </div>
            <br/>
            <button type="submit" onclick="company.edit(); return false;" class="btn companyControlBtn btn-default button-half">
              <span class="glyphicon glyphicon-ok-sign"></span> Save
            </button>
            <button type="submit" onclick="company.delete(); return false;" class="btn companyControlBtn btn-danger button-half">
              <span class="glyphicon glyphicon-remove-sign"></span>   Delete
            </button>
        </form>
      </div>
      <div class="createCompany companyForm company hiddenForm">
        <div class="userfeedback_company_create"></div>
        <form id="companyCreateForm">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name"  placeholder=" Company name" value="">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email"  placeholder="Company email" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="address" name="address"  placeholder="Company address" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="openingH" name="openingH"  placeholder="Company Opening Hours"></textarea>
            </div>
            <br/>
            <button type="submit" onclick="company.create();return false;" class="btn btn-default button-half">
              <span class="glyphicon glyphicon-ok-sign"></span> Save
            </button>
            <button  onclick="hide.companyCreate();return false;" class="btn btn-default button-half btn-warning">
              <span class="glyphicon glyphicon-ban-circle"></span>Cancel
            </button>
            <!-- <button type="submit" onclick="company.create(); return false;" class="btn btn-default button-wide">Save</button> -->
        </form>
      </div>
    </div>
    
<!-- STAFF BLOCK -->
    <div class="staffForm submenu_item hidden">
    <div class="form-group top_group">
        <select onchange="service.getAll('availableCompaniesStaffSelect');" class="availableCompaniesSelect" data-style="btn-primary" name="companyId" id="availableCompaniesStaffSelect">
          <option value="0">Nothing selected</option>
        </select>
        <button class="btn btn-wide btn-custom1 noHover" onclick="show.staffCreate();">Create new staff member</button>

    </div>
    <div class="availableStaff editTile">
      
    </div>
    <div class='createStaff staff hiddenForm'>
      <div class="userfeedback_staff_create"></div>
      <form id="staffCreateForm">
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name"  placeholder=" Staff name" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="surname" name="surname"  placeholder=" Staff surname" value="">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email"  placeholder="Staff email" value="">
          </div>
          <div class="form-group availableServices">
          <label for="services">Services Available</label>
            
          </div>
          <br/>
          <button type="submit" onclick="staff.create();return false;" class="btn btn-default button-half">
            <span class="glyphicon glyphicon-ok-sign"></span> Save
          </button>
          <button  onclick="hide.staffCreate();return false;" class="btn btn-default button-half btn-warning">
            <span class="glyphicon glyphicon-ban-circle"></span>Cancel
          </button>
      </form>
    </div>

    <div class='editStaff staff hiddenForm'>
      <div class="userfeedback_staff_create"></div>
      <form id="staffEditForm">
          <input type="hidden" id='staffId' name='staffId' value=""/>
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name"  placeholder=" Staff name" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="surname" name="surname"  placeholder=" Staff surname" value="">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email"  placeholder="Staff email" value="">
          </div>
          <div class="form-group availableServices">
          <label for="services">Services Available</label>
            
          </div>
          <br/>
          <button type="submit" onclick="staff.edit();return false;" class="btn btn-default button-half">
            <span class="glyphicon glyphicon-ok-sign"></span> Update
          </button>
          <button  onclick="hide.editStaff();return false;" class="btn btn-default button-half btn-warning">
            <span class="glyphicon glyphicon-ban-circle"></span>Cancel
          </button>
      </form>
    </div>
    
    </div>
<!-- Services BLOCK -->
    
    <div class="createService servicesForm submenu_item hidden">
    <div class="form-group top_group">
        <select onchange="service.getAll('availableCompaniesServiceSelect');" class="availableCompaniesSelect" data-style="btn-primary" name="companyId" id="availableCompaniesServiceSelect">
          <option value="">Nothing selected</option>
        </select>
        <button class="btn btn-wide btn-custom1 noHover" onclick="show.serviceCreate();">Create new service</button>
    </div>
    <div class="servicesContainer">
      <ul id='servicesList'>
        
      </ul>
    </div>
    <div class="availableServicesContainer editTile">
      
    </div>
    <div class="createServices servicesForm  services hiddenForm">
      <div class="userfeedback_service_create"></div>
        <form id="serviceCreateForm">
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name"  placeholder="Service name" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="price" name="price"  placeholder="Price" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="description" name="description"  placeholder="Service Description"></textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="duration" name="duration"  placeholder="Duration" value="">
            </div>
            <br/>
            <button type="submit" onclick="service.create(); return false;" class="btn btn-default button-half">
              <span class="glyphicon glyphicon-ok-sign"></span> Save
            </button>
            <button  onclick="hide.serviceCreate();return false;" class="btn btn-default button-half btn-warning">
              <span class="glyphicon glyphicon-ban-circle"></span>Cancel
            </button>
        </form>
      </div>
      <div class="editService services hiddenForm">
      <div class="userfeedback_service_edit"></div>
        <form id="serviceEditForm">
            <input type="hidden" id='serviceId' name='serviceId' value=""/>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name"  placeholder="Service name" value="">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="price" name="price"  placeholder="Price" value="">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="description" name="description"  placeholder="Service Description"></textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="duration" name="duration"  placeholder="Duration" value="">
            </div>
            <br/>
            <button type="submit" onclick="service.edit(); return false;" class="btn btn-default button-half">
              <span class="glyphicon glyphicon-ok-sign"></span> Update
            </button>
            <button  onclick="hide.editService();return false;" class="btn btn-default button-half btn-warning">
              <span class="glyphicon glyphicon-ban-circle"></span>Cancel
            </button>
        </form>
      </div>
    </div>
  </div>

    <script type="text/javascript" src="/bookrest/site/inc/lib/js/subnav.js"></script>
</body>
</html>