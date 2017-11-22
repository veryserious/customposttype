<?php
/*
Plugin Name: Slim Custom Post Type
Description: Slim custom post type plugin to create a simple project custom post type with minimal customisation
Version: 0.0.1
Author: Very Serious

Customisation options
    replace twentyfifteen with your theme name
*/


// hook into the init action and call create_people_taxonomy when it fires
add_action( 'init', 'create_role_taxonomies', 0 );

// create "projects" custom post type

function custom_post_type_project() {
    
   // Set UI labels for Custom Post Type
       $labels = array(
           'name'                => _x( 'Projects', 'Post Type General Name', 'twentyfifteen' ),
           'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'twentyfifteen' ),
           'menu_name'           => __( 'Projects', 'twentyfifteen' ),
           'parent_item_colon'   => __( 'Parent Project', 'twentyfifteen' ),
           'all_items'           => __( 'All Projects', 'twentyfifteen' ),
           'view_item'           => __( 'View Project', 'twentyfifteen' ),
           'add_new_item'        => __( 'Add New Project', 'twentyfifteen' ),
           'add_new'             => __( 'Add New', 'twentyfifteen' ),
           'edit_item'           => __( 'Edit Project', 'twentyfifteen' ),
           'update_item'         => __( 'Update Project', 'twentyfifteen' ),
           'search_items'        => __( 'Search Project', 'twentyfifteen' ),
           'not_found'           => __( 'Not Found', 'twentyfifteen' ),
           'not_found_in_trash'  => __( 'Not found in Trash', 'twentyfifteen' ),
       );
        
   // Set other options for Custom Post Type
        
       $args = array(
           'label'               => __( 'project', 'twentyfifteen' ),
           'description'         => __( 'projects', 'twentyfifteen' ),
           'labels'              => $labels,
           // Features this CPT supports in Post Editor
           'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'people' ),
           /* A hierarchical CPT is like Pages and can have
           * Parent and child items. A non-hierarchical CPT
           * is like Posts.
           */ 
           'hierarchical'        => false,
           'public'              => true,
           'show_ui'             => true,
           'show_in_menu'        => true,
           'show_in_nav_menus'   => true,
           'show_in_admin_bar'   => true,
           'menu_position'       => 5,
           'can_export'          => true,
           'has_archive'         => true,
           'exclude_from_search' => false,
           'publicly_queryable'  => true,
           'capability_type'     => 'page',
           'taxonomies'          => array ('category'),
       );
        
       // Registering your Custom Post Type
       register_post_type( 'Projects', $args );
    
   }
    
   /* Hook into the 'init' action so that the function
   * Containing our post type registration is not 
   * unnecessarily executed. 
   */
    
   add_action( 'init', 'custom_post_type_people', 0 );
   add_action( 'init', 'custom_post_type_project', 0 );
 
 
?>