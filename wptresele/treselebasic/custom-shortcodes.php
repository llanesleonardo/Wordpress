<?php 
function template_part_function($attrs){
    $tp_atts = shortcode_atts(array( 
       'path' =>  null,
    ), $attrs);         
    ob_start();  
    get_template_part($tp_atts['path']);  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;   
 }
 add_shortcode('template_part_code', 'template_part_function');  



?>