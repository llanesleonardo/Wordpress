<?php 
function template_part_function($atts){
 /*   echo '<pre>'.print_r($attr).'</pre>';
    $tp_atts = shortcode_atts(array( 
       'path' =>  null,
    ), $atts);         
    ob_start();  
    get_template_part($tp_atts['path']);  
    $ret = ob_get_contents();  
    ob_end_clean();  
    return $ret;  */
    return "HOLA";  
 }
 add_shortcode('template_part_code', 'template_part_function');  
?>