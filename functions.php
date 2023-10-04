<?php

class CustomPostType{

    public function __construct() {
        add_action('init',array($this,'register_custom_post_type'));
        add_action('init',array($this,'add_taxonomy'));


    }
    public function register_custom_post_type(){

        $args = array(
        
        'labels' => array(
        'name'=>'Products',
        'signular_name' => 'Product',
        
        ),
        
        
        'public' => true,
        'has_archive' => true,
        'supports'=>array('title','thumbnail','editor'),
        'menu_icon'=>'dashicons-products',
        'hierarchical'   => false,
        
        
        
        
        
        );
        
        register_post_type('products',$args);
        
        
        }
        
        

       public function add_taxonomy(){


            $args = array(
        
                'labels' => array(
        
                    'name' =>'Brands',
                 'signular_name' => 'Brand',
                    
                ),
                'public'=>true,
               'hierarchical' => true,
        
        
            );
        
            register_taxonomy('brands', array('products'), $args);

        }
        
}





$custom_post_type = new CustomPostType();










?>