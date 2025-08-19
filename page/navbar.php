<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?=SITE_URL?>">
      <img src="<?=$action->helper->loadimage('logo.png')?>" alt="" height="24" class="d-inline-block align-text-top">
      CVOnline
    </a>
  
 
      <ul class="navbar-nav">
<?php
if($action->user_id()){
  ?>
   <li class="nav-item">
          <a class="nav-link <?=@$myresume?>" aria-current="page" href="<?=$action->helper->url('home')?>"><i class="bi bi-file-earmark-medical"></i> My Resumes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=@$profile?>" href="#"><i class="bi bi-person-circle"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=$action->helper->url('action/logout')?>"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </li>
    
  <?php
}else{
  ?>
  <li class="nav-item">
          <a class="nav-link" href="<?=$action->helper->url('login')?>"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=$action->helper->url('signup')?>"><i class="bi bi-person-plus-fill"></i> Signup</a>
        </li>
<?php
      }
?>
     

      </ul>
 
  </div>
</nav>