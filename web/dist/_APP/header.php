<header class="clearfix">

      <!-- Start Top Bar -->
     <?php
if($_SESSION['login_tkm']=='active'){
      ?>
      <div class="top-bar ">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!-- Start Contact Info -->
              <ul class="contact-details">
               
              <li>
                <a href="#"><i class="fa fa-lock"></i> <?php
                if($_SESSION['idControl']==1){
                echo "administrador";
              }else{
                echo "Grupo";
              }
                 ?></a>
                </li>
                
                <li><a href="#"><i class="fa fa-user"></i> <?php echo "$_SESSION[nombre] $_SESSION[apellido] ";
                 ?></a>
                </li>


              

              </ul>
              <!-- End Contact Info -->
            </div>
            <div class="col-md-6">
              <ul class="contact-details">


              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!-- End Top Bar -->

      <!-- Start Header ( Logo & Naviagtion ) -->
      <div class="navbar navbar-default navbar-top bg-blue1">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
<!-- <div class="navbar-brand" href=""><img alt="" src="images/margo.png"></a>
 -->
<div class="navbar-brand "  id="text-brand"><img alt="" src="asset/img/logo.png"></div>


          </div>
          <div class="navbar-collapse collapse">
            <!-- Stat Search -->
            <!-- <div class="search-side">
              <a class="show-search"><i class="fa fa-search"></i></a>
              <div class="search-form">
                <form autocomplete="off" role="search" method="get" class="searchform" action="#">
                  <input type="text" value="" name="s" id="s" placeholder="Search the site...">
                </form>
              </div>
            </div> -->
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">

<?php function menu(){

if($_SESSION['login_tkm']=='active'){

  
  echo  <<<EOT

<li><a href="Reglamento_Gandhi.pdf" target="_blank" >Reglamento</a></li>


EOT;


}

}
// end function menu

menu();
  ?>

<?php if($_SESSION['login_tkm']=='active'){?>
<li><a href="?option=-1">Cerrar sesión</a></li>
<?PHP } ?>


            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">


          <?php  menu(); ?>
          <?php if($_SESSION['login_tkm']=='active'){?>
<li><a href="?option=-1">Cerrar sesión</a></li>
<?PHP } ?>
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header ( Logo & Naviagtion ) -->

    </header>