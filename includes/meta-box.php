<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sm_add_meta_boxes() {
    add_meta_box(
        'sm_thong_tin_sv',
        'Thông tin sinh viên',
        'sm_render_meta_box',
        'sinh_vien',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'sm_add_meta_boxes' );

function sm_render_meta_box( $post ) {
    wp_nonce_field( 'sm_save_meta', 'sm_nonce' );

    $mssv      = get_post_meta( $post->ID, '_sm_mssv', true );
    $lop       = get_post_meta( $post->ID, '_sm_lop', true );
    $ngay_sinh = get_post_meta( $post->ID, '_sm_ngay_sinh', true );

    $chuyen_nganh = array( 'CNTT', 'Kinh tế', 'Marketing' );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="sm_mssv">Mã số sinh viên (MSSV)</label></th>
            <td>
                <input type="text" id="sm_mssv" name="sm_mssv"
                       value="<?php echo esc_attr( $mssv ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="sm_lop">Lớp / Chuyên ngành</label></th>
            <td>
                <select id="sm_lop" name="sm_lop">
                    <option value="">-- Chọn chuyên ngành --</option>
                    <?php foreach ( $chuyen_nganh as $cn ) : ?>
                        <option value="<?php echo esc_attr( $cn ); ?>"
                            <?php selected( $lop, $cn ); ?>>
                            <?php echo esc_html( $cn ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="sm_ngay_sinh">Ngày sinh</label></th>
            <td>
                <input type="date" id="sm_ngay_sinh" name="sm_ngay_sinh"
                       value="<?php echo esc_attr( $ngay_sinh ); ?>">
            </td>
        </tr>
    </table>
    <?php
}

function sm_save_meta( $post_id ) {
    if ( ! isset( $_POST['sm_nonce'] ) || ! wp_verify_nonce( $_POST['sm_nonce'], 'sm_save_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['sm_mssv'] ) ) {
        update_post_meta( $post_id, '_sm_mssv', sanitize_text_field( $_POST['sm_mssv'] ) );
    }

    if ( isset( $_POST['sm_lop'] ) ) {
        update_post_meta( $post_id, '_sm_lop', sanitize_text_field( $_POST['sm_lop'] ) );
    }

    if ( isset( $_POST['sm_ngay_sinh'] ) ) {
        update_post_meta( $post_id, '_sm_ngay_sinh', sanitize_text_field( $_POST['sm_ngay_sinh'] ) );
    }
}
add_action( 'save_post_sinh_vien', 'sm_save_meta' );
