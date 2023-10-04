<?php




function custom_post_type(){

$args = array(

'labels' => array(
'name'=>'Products',
'signular_name' => 'Product',

),


'public' => true,
'has_archive' => true,
'supports'=>array('title','thumbnail','editor'),
'menu_icon'=>'dashicons-products',
'hierarchical'       => false,





);



register_post_type('products',$args);


}


add_action('init','custom_post_type')


?>