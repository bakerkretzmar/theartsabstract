<?php

/**
 * Plugin Name: The Arts Abstract Post Meta
 */
add_action('add_meta_boxes_post', function (): void {
    add_meta_box('theartsabstract-meta', 'Meta', function (WP_Post $post): void {
        wp_nonce_field('theartsabstract_meta', 'theartsabstract_meta_nonce');
        ?>
        <p>
            <label for="theartsabstract-subtitle">Subtitle</label>
            <textarea id="theartsabstract-subtitle" name="theartsabstract_subtitle" rows="4" class="widefat"><?php echo esc_textarea(get_post_meta($post->ID, 'subtitle', true)); ?></textarea>
        </p>
        <p>
            <label for="theartsabstract-link">External Link</label>
            <input id="theartsabstract-link" name="theartsabstract_link" type="url" class="widefat" value="<?php echo esc_attr(get_post_meta($post->ID, 'link', true)); ?>">
        </p>
        <?php
    }, 'post', 'side');
});

add_action('save_post_post', function (int $postId): void {
    if (
        ! isset($_POST['theartsabstract_meta_nonce'])
        || ! wp_verify_nonce($_POST['theartsabstract_meta_nonce'], 'theartsabstract_meta')
        || ! current_user_can('edit_post', $postId)
        || wp_is_post_autosave($postId)
    ) {
        return;
    }

    if (isset($_POST['theartsabstract_subtitle'])) {
        update_post_meta($postId, 'subtitle', sanitize_textarea_field(wp_unslash($_POST['theartsabstract_subtitle'])));
    }

    if (isset($_POST['theartsabstract_link'])) {
        update_post_meta($postId, 'link', esc_url_raw(wp_unslash($_POST['theartsabstract_link'])));
    }
});
