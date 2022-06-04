<!DOCTYPE html>

<head>
    <meta charset="utf_8">

    <title>
       Intersom Soluciones Financieras
    </title>
    <?php  wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
<?php 
$destacada = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
$destacada=$destacada[0];
?>

    <div class="tophead">
        <div class="row">
             <div class="col-md-2">
             </div>
            <div class="col-md-4">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/whatsapp.png" width="30" /> <b style="font-size:18px;">+52 2222222222</b>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4 ">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/twitter.png" width="30" />
                 <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/facebook.png" width="30" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/instagram.png" width="30" />
                   <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/youtube.png" width="30" />
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon/linkedin.png" width="30" />
            </div>
        </div>
     </div>


    <header class="site-header" >

        <nav class="navegacion">
            <div class="container">
               
                    <div class="navbar-header">
                        <button type="button" onclick="abrecierra('#navbar')" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                            <span class="sr-only" >Toggle Navigation</span>        
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                       <a href="/"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logos/logo_intersom.png" class="logoimg" alt=""  /> </a>
                           
                    </div>
                    <div class="navbar-right" style="text-align:right;">
                       <?php wp_nav_menu( array(
                           'team_location'=>'menu_principal',
                           'container_class'=>'collapse navbar-collapse',
                           'container_id'=>'navbar',
                           'menu_class'=>'nav navbar-nav nav-right'
                       ) ); ?>
               
                </div>
                </div>
           
        </nav>
    </header>        