<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bro Themes</title>
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
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
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
                            'menu_class' =>'nav navbar-nav navbar-right'
                            ) 
                            ); 
                        ?>
                            
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <div class="search-form-container" >
                    <?php get_search_form(); ?>
                </div> 
                </div>
                
            </div>
        