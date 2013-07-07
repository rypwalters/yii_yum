<?php /* @var $this Controller */ 

  $page = Yii::app()->request->url;
  
  $show_signin = ($page == "/") ? true : false;
?>
<!DOCTYPE html>
<html>                                         
<head>
	<!--<meta name="viewport" content="width=device-width">-->
	<meta name="viewport" content="user-scalable=no, width=device-width" />
	
	<title>Yii Yum Dev Area</title> 

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/landing.css" rel='stylesheet' type='text/css'>
  
  <link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon-16x16-2.ico?<?php echo date("s"); ?>" /> 
  <link rel="shortcut icon" type="image/x-icon" sizes="32x32" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon-32x32.ico" />
  <link rel="shortcut icon" type="image/x-icon" sizes="64x64" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon-64x64.ico" />
  
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/touch-icon-72x72.png" />
  <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/touch-icon-iphone.png" />  
	
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
 
</head>

<body>
  
  <div class="header">
    <div class="content">

      <div class="logo"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" /></a></div>
      <span class="slogan">Cool Slogan
<?php
	// Is this a dev or staging site?
	if( isset( $_SERVER[ 'yii_siteDesc' ] ) AND
		$_SERVER[ 'yii_siteDesc' ] != 'Production' )
	{
		echo ' [' . $_SERVER[ 'yii_siteDesc' ] . ']';
	}
?></span>

      <div id="myAccountMbMenu">
<?php
	// Show sign in?
	if( Yii::app()->user->isGuest )
	{
		echo "<a href=\"/user/user/login\">Sign In</a>";
	}
	else
	{
    $this->widget('application.extensions.mbmenu.MbMenu',array(
      'items'=>array(
        array( 'label'=>Yii::app()->user->name,
               'items'=>array(
                 array( 'label'=>'Profile', 'url'=>array( '/profile/profile/view' ) ),
                 array( 'label'=>'Privacy', 'url'=>array( '/profile/privacy/update' ) ),
                 array( 'label'=>'Memberships', 'url'=>array( '/membership/membership/index' ) ),
                 array( 'label'=>'Messages', 'url'=>array( '/message/message/index' ) ),
                 array( 'label'=>'Friends', 'url'=>array( '/friendship/friendship/index' ) ),
                 array( 'label'=>'Sign Out', 'url'=>array( '/user/user/logout' ) ),
               ),
        ),
      ),
    ));
	}
?>
      </div>
      <br class="clear-right" />
    </div>
  </div>

  <div id="landing-index" class="main section-wide">
    <div class="content">  

<?php echo $content; ?>
  
      <br class="clear-left" />            
    </div>
  </div>

  <div class="footer texture-paper">
    <div class="content">

      <div class="block no-mobile">
        Copright 2013
      </div>
      
      <br class="clear-left" />     
    </div>
  </div>
     
</body>

</html> 
