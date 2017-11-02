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
<?php wp_nav_menu( array('theme_location' =>'primary' ) ); ?>