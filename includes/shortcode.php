<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_danh_sach_sinh_vien() {
    $query = new WP_Query( array(
        'post_type'      => 'sinh_vien',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    if ( ! $query->have_posts() ) {
        return '<p>Chưa có sinh viên nào.</p>';
    }

    wp_enqueue_style( 'sm-style', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/style.css' );

    $html  = '<table class="sm-table">';
    $html .= '<thead><tr>';
    $html .= '<th>STT</th><th>MSSV</th><th>Họ tên</th><th>Lớp</th><th>Ngày sinh</th>';
    $html .= '</tr></thead><tbody>';

    $stt = 1;
    while ( $query->have_posts() ) {
        $query->the_post();
        $post_id   = get_the_ID();
        $mssv      = get_post_meta( $post_id, '_sm_mssv', true );
        $lop       = get_post_meta( $post_id, '_sm_lop', true );
        $ngay_sinh = get_post_meta( $post_id, '_sm_ngay_sinh', true );

        if ( $ngay_sinh ) {
            $ngay_sinh = date_i18n( 'd/m/Y', strtotime( $ngay_sinh ) );
        }

        $html .= '<tr>';
        $html .= '<td>' . esc_html( $stt ) . '</td>';
        $html .= '<td>' . esc_html( $mssv ) . '</td>';
        $html .= '<td>' . esc_html( get_the_title() ) . '</td>';
        $html .= '<td>' . esc_html( $lop ) . '</td>';
        $html .= '<td>' . esc_html( $ngay_sinh ) . '</td>';
        $html .= '</tr>';

        $stt++;
    }
    wp_reset_postdata();

    $html .= '</tbody></table>';

    return $html;
}
add_shortcode( 'danh_sach_sinh_vien', 'sm_danh_sach_sinh_vien' );
