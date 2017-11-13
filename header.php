<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="description" content="<?php bloginfo( 'description' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<?php 
    if (is_front_page()):
        $BroClasses = array('Brocool-class','My-class');
        else :
            $BroClasses = array('none') ;
    endif;        

?>
<body <?php body_class( $BroClasses ); ?> >
        <div class="container" >
            <div class="row" >
                <div class="col-xs-12" >
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">BroTheme</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">           
                        <?php 
                        wp_nav_menu( array(
                            'theme_location' =>'primary',
                            'container' => false,
                            'menu_class' =>'nav navbar-nav navbar-right',
                            'walker' => new Walker_Nav_Primary()
                            ) 
                            ); 
                        ?>
                            
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div> 
                <div class="col-xs-12">
					<div class="search-form-container">
						<div class="container">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
                </div>
                
            </div>
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
