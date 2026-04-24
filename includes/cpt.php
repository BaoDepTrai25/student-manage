<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_register_post_type() {
    $labels = array(
        'name'               => 'Sinh viên',
        'singular_name'      => 'Sinh viên',
        'menu_name'          => 'Sinh viên',
        'add_new'            => 'Thêm mới',
        'add_new_item'       => 'Thêm sinh viên mới',
        'edit_item'          => 'Chỉnh sửa sinh viên',
        'new_item'           => 'Sinh viên mới',
        'view_item'          => 'Xem sinh viên',
        'search_items'       => 'Tìm sinh viên',
        'not_found'          => 'Không tìm thấy sinh viên',
        'not_found_in_trash' => 'Không có sinh viên trong thùng rác',
    );

    $args = array(
        'labels'      => $labels,
        'public'      => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor' ),
        'menu_icon'   => 'dashicons-groups',
        'rewrite'     => array( 'slug' => 'sinh-vien' ),
    );

    register_post_type( 'sinh_vien', $args );
}

add_action( 'init', 'sm_register_post_type' );
