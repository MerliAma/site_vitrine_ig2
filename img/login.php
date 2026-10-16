<?php require_once('Connections/cnx_procedurale.php'); ?>
<?php if (!isset($_SESSION)) {session_start(); } ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$message="";
if (isset($_POST['login'])) {
  $loginUsername=$_POST['login'];
  $password=$_POST['pwd'];
  $salt = "forty@itp2015"; $password_crypte = sha1(sha1($password).$salt);
  $MM_fldUserAuthorization = "etat";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_cnx_procedurale, $cnx_procedurale);
  	
  $LoginRS__query=sprintf("SELECT idt_utilisateur, t_utilisateurEmail, t_utilisateurMdp, t_utilisateurEtat, t_utilisateurStaut, t_utilisateurPhoto, t_utilisateurNom, t_utilisateurPrenom 
    FROM t_utilisateur WHERE t_utilisateurEmail=%s AND t_utilisateurMdp=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password_crypte, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $cnx_procedurale) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
	$idcompte = mysql_result($LoginRS,0,0);
    $loginEtat  = mysql_result($LoginRS,0,3);
    $loginAdmin  = mysql_result($LoginRS,0,4);
	$loginPhoto  = mysql_result($LoginRS,0,5);
	$loginNom  = mysql_result($LoginRS,0,6);
	$loginPrenom  = mysql_result($LoginRS,0,7);
	
	// if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
	
	  //$_SESSION['lock'] = 0;
		  
	  if ($loginEtat==1){
	  //declare two session variables and assign them
		  $_SESSION['MM_Username'] = $loginUsername;
		  $_SESSION['Id'] = $idcompte;
		  $_SESSION['Etat'] = $loginEtat;
		  $_SESSION['lock'] = 1; 	 
		  $_SESSION['Admin'] = $loginAdmin;
		  $_SESSION['Photo'] = $loginPhoto;
		  $_SESSION['Nom'] = $loginNom;
		  $_SESSION['Prenom'] = $loginPrenom; 
		     
      //header("Location: back/o_pages/tb.php");
	  $message="<h3>Back office hors sevice veillez patienter dans 5 jours merci </h3> ";
	  }else{    $message="<h3>Votre compte n'est pas actif</h3> "; }
  } else {   $message="<b>Login ou mot de passe incorrecte !</b> <br> si vous n'arriver pas contacter le gestionnaire MERCI "; }
}
?>
<!DOCTYPE html>
<html lang="fr"><!-- InstanceBegin template="/Templates/pages.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="author" content="cosmic">
    <meta name="keywords" content="Bootstrap 3, Template, Theme, Responsive, Corporate, Business">
    <link rel="shortcut icon" href="img/parallax-slider/images/2.png">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Inter-Groupe |  Login </title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


  
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
  <!-- InstanceBeginEditable name="head" -->
  <!-- InstanceEndEditable -->
  </head>

  <body>
    <!--header start-->
    <header class="head-section">
      <div class="navbar navbar-default navbar-static-top container">
          <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">INTER-<span>GROUPE</span></a>
          </div>
          <div class="navbar-collapse collapse">
              
                            <ul class="nav navbar-nav">
                   <li>
                      <a href="index.php">Acceuil</a>
                  </li>
                  <li>
                      <a href="qui_sommes_nous.php">Présentation</a>
                  </li>
                <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown" href="informatique.php">Formation <i class="fa fa-angle-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li >
                              <a href="informatique.php#informatique" >INFORMATIQUE</a>
                          </li>
                          <li>
                              <a href="informatique.php#droit">DROIT</a>
                          </li>
                          <li>
                              <a href="informatique.php#finance">GESTION DES FINANCES</a>
                          </li>
                          <li>
                              <a href="informatique.php#industriel">SECTEUR INDUSTRIEL</a>
                          </li>
                          <li>
                              <a href="informatique.php#communication">GESTION ET COMMUNICATION</a>
                          </li>
                                                    
                  </ul>
                  </li>
                  <li>
                      <a href="developpement.php">Développement</a>
                  </li>
                <li >    <a href="telechargement.php">Télechargement </a>                 
                  </li>
                  <li >   <a href="reference.php">Nos Réference </a>
                      
                  </li>
                  <li>
                      <a href="contact.php">Contact </a>
                  </li>
                  
                <li><input class="form-control search" placeholder=" Search" type="text"></li>
              </ul>
          </div>
      </div>
    </header>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6"><!-- InstanceBeginEditable name="titrePage" -->
            <h1> Connection </h1>
          <!-- InstanceEndEditable --></div>
          <div class="col-lg-8 col-sm-6"><!-- InstanceBeginEditable name="breadcrump" -->
            <ol class="breadcrumb pull-right">
              <li> <a href="index.php"> Acces  </a> </li>              
              <li class="active">Admin | Partenaire </li>
            </ol>
          <!-- InstanceEndEditable --></div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="container">
      <div class="row">
	  
      <!--blog start-->
      <div class="col-lg-9 "><!-- InstanceBeginEditable name="contenuPage" -->
        
        <div class="login-bg">
<?php if($message!="")  {?>
    <div class="alert alert-danger alert-dismissable">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button"> × </button>
        <h4>   <i class="icon fa fa-warning"> </i>  Alerte!  </h4>
        <?php echo $message; ?>
    </div> 
<?php }?> 
               
        <div class="container">
            <div class="form-wrapper">
            <form class="form-signin wow fadeInUp" action="<?php echo $loginFormAction; ?>" method="POST" name="cnx">
            <h2 class="form-signin-heading">Renseigner correctement S.V.P!</h2>
            <div class="login-wrap">
                <input type="email" name="login" required class="form-control" placeholder="E-mail" autofocus autocomplete="off">
                <input type="password" name="pwd" autocomplete="off" contenteditable="true" required class="form-control" placeholder="Mot de passe">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Se rappeler de moi
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Mot de passe oublier ?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Connexion</button>
                
                <div class="registration">
                    
                    <a class="" href="contact.php">
                        Si votre compte est inactif Contactez nous ici
                    </a>
                </div>

            </div>

              <!-- Modal -->
              <!--<div aria-hidden="true" aria-labelledby="myModal" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">passe oublier ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>-->
              <!-- modal -->

          </form>
          </div>
        </div>
    </div>
        
		<!-- InstanceEndEditable -->
      </div>
      
      <div class="col-lg-3">
        <div class="blog-side-item">
        <div class="archive"> <img src="img/parallax-slider/images/2.png" class="img-responsive" width="auto" height="auto"> </div>
        
          <div class="category">
            <h3> Formations en cours </h3>
            <ul class="list-unstyled">
              <li> <a href="javascript:;"> <i class="fa fa-angle-right pr-10"> </i> Resoureces humaine </a> </li>
              <li> <a href="javascript:;"> <i class="fa fa-angle-right pr-10"> </i> comptabilite </a> </li>
              <li> <a href="javascript:;"> <i class="fa fa-angle-right pr-10"> </i> Developpement Android </a> </li>
              <li> <a href="javascript:;"> <i class="fa fa-angle-right pr-10"> </i> Gestion de Stock </a> </li>
              <li> <a href="javascript:;"> <i class="fa fa-angle-right pr-10"> </i> Infographie </a> </li>
            </ul>
          </div>
          <div >
          <div class="carousel slide" data-ride="carousel" id="quote-carousel">
  
            <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner">

              <!-- Quote 1 -->
              <div class="item active">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/clipaa.png" style="width: 200px; height:200px;" alt="">
                    </div>
                  </div>
                </blockquote>
              </div>
              <!-- Quote 2 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/bollore.png" style="width: 200px;height:100px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
              <!-- Quote 3 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/cargil.png" style="width: 200px;height:100px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
              <!-- Quote 3 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/clicophesudco.png" style="width: 200px;height:100px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
              <!-- Quote 3 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/pci.png" style="width: 126px;height:184px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
              <!-- Quote 3 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="img-circle" src="img/clients/petroivoire.png" style="width: 200px;height:100px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
              <!-- Quote 3 -->
              <div class="item">
                <blockquote>
                  <div class="row">
                    <div class="col-sm-3 text-center">
                      <img class="" src="img/clients/sifca.png" style="width: 200px;height:100px;" alt="">
                    </div>
                    
                  </div>
                </blockquote>
              </div>
            </div>


          </div>

        </div>
        
          <div class="blog-post">
            <h3> Formations Programmées </h3>
            <div class="media"> <a class="pull-left" href="javascript:;">
             <img class=" " src="img/formation/presentation-sage1000.jpg" alt="" width="81" height="70"> </a>
              <div class="media-body">
                <h5 class="media-heading"> <a href="javascript:;"> 02 Novembre 2015 </a> </h5>
                <p> SAGE 1000 </p>
              </div>
            </div>
            <div class="media"> <a class="pull-left" href="javascript:;"> 
            <img class=" " src="img/formation/office360.png" alt=""  width="81" height="81"> </a>
              <div class="media-body">
                <h5 class="media-heading"> <a href="javascript:;"> 10 Novembre 2015 </a> </h5>
                <p>OFFICE 360 Pour les petites et moyennes entreprises. </p>
              </div>
            </div>
            <div class="media"> <a class="pull-left" href="javascript:;"> <img class=" " src="img/formation/php.jpg" alt="" width="81" height="100"> </a>
              <div class="media-body">
                <h5 class="media-heading"> <a href="javascript:;"> 20 Nonembre 2015 </a> </h5>
                <p> Developpement Web avec PHP 5 </p>
              </div>
            </div>
          </div>
          <div class="tags">
            <h3> Tags </h3>
            <ul class="tag">
              <li> <a href="http://webmail1.hostinger.fr/roundcube/" target="new" > <i class="fa fa-mail pr-5"> </i> Webmail </a> </li>
              <li> <a href="qui_sommes_nous.php"> <i class="fa fa-paw pr-5"> </i> Présentation </a> </li>
              <li> <a href="informatique.php"> <i class="fa fa-tags pr-5"> </i> Formation </a> </li>
              <li> <a href="documentupload/Extrait%20Catalogue%20de%20Formation.pdf" target="new" 
              download="Catalogue de formation intergroupe.pdf"> <i class="fa fa-image pr-5"> </i>Telecharger le Catalogue </a> </li>
              <li> <a href="developpement.php"> <i class="fa fa-tags pr-5"> </i> Développement </a> </li>
              <li> <a href="faq.php"> <i class="fa fa-tag pr-5"> </i> faq </a> </li>
              <li> <a href="telechargement.php"> <i class="fa fa-download pr-5"> </i> Télechargement </a> </li>
              <li> <a href="contact.php"> <i class="fa fa-tags pr-5"> </i> Contact </a> </li>
              <li> <a href="reference.php"> <i class="fa fa-tags pr-5"> </i> Nos Réference </a> </li>
              <li> <a href="espace_fdfp.php"> <i class="fa fa-tags pr-5"> </i> Espace fdfp </a> </li>
              <li> <a href="login.php"> <i class="fa fa-qrcode pr-5"> </i> Membres Acces </a> </li>
            </ul>
          </div>
          
          
        </div>
      </div>
      <!--blog end-->
      </div>

    </div>
    <!--container end-->

    <!--footer start-->
     <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
            <h1>
              contact info
            </h1>
            <address>
              <p><i class="fa fa-home pr-10"></i>Address: 08 BP 1697 Abj 08</p>
              <p><i class="fa fa-globe pr-10"></i>Treichville, Côte d'Ivoire </p>
              <p><i class="fa fa-mobile pr-10"></i>Mobile : (+225) 21-24-60-13 </p>
              <p><i class="fa fa-phone pr-10"></i>Phone : (+225) 21-24-72-02 </p>
              <p><i class="fa fa-envelope pr-10"></i>Email :   <a href="mailto:infos@intergroupe-ci.com">infos@intergroupe-ci.com</a></p>
            </address>
          </div>
          <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
            <h1> Facebook</h1>
              <div class="tweet-box">
                <i class="fa fa-facebook"></i>
                <em>
                  Please follow
                  <a href="javascript:;">@example</a>
                  for all future updates of us!
                  <a href="javascript:;">twitter.com/acme</a>
                </em>
              </div>
              <div class="tweet-box">
                <i class="fa fa-facebook"></i>
                <em>
                  Please follow
                  <a href="javascript:;">@example</a>
                  for all future updates of us!
                  <a href="javascript:;">twitter.com/acme</a>
                </em>
              </div>
              <div class="tweet-box">
                <i class="fa fa-facebook"></i>
                <em>
                  Please follow
                  <a href="javascript:;">@example</a>
                  for all future updates of us!
                  <a href="javascript:;">twitter.com/acme</a>
                </em>
              </div>
          </div>
          <div class="col-lg-3 col-sm-3">
            <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
              <h1>
                Acces Rapide
              </h1>
              <ul class="page-footer-list">
                <li>
                  <i class="fa fa-angle-right"></i>
                  <a href="index.php">Acceuil</a>
                </li>
                <li>
                  <i class="fa fa-angle-right"></i>
                  <a href="qui_sommes_nous.php">Qui Sommes nous ? </a>
                </li>
                <li>
                  <i class="fa fa-angle-right"></i>
                  <a href="contact.php">Contact</a>
                </li>
                <li>
                  <i class="fa fa-angle-right"></i>
                  <a href="faq.php">FAQ</a>
                </li>
                <li>
                  <i class="fa fa-angle-right"></i>
                  <a href="http://webmail1.hostinger.fr/roundcube/" target="new">Webmail</a>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    <ul class="social-link-footer list-unstyled">

                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".6s"><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".8s"><a href="#"><i class="fa fa-youtube"></i></a></li>

                    </ul>
                </div>
                <div class="col-md-4">
                  <div class="copyright">
                    <p>&copy; Copyright Inter-groupe.</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
    <!--small footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script type="text/javascript" src="js/hover-dropdown.js">
    </script>
    <script defer src="js/jquery.flexslider.js">
    </script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js">
    </script>

    <script src="js/jquery.easing.min.js">
    </script>
    <script src="js/link-hover.js">
    </script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js">
    </script>


    <script src="js/wow.min.js">
    </script> 

  <script>
      wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0          // default
        }
      )
        wow.init();
    </script>
    <!-- InstanceBeginEditable name="ownscrip" -->
    
    <!-- InstanceEndEditable -->
  </body>
<!-- TemplateEnd --><!-- InstanceEnd --></html>
