<?php
/**
 * User Profile Fields for Social Media
 *
 * Adds social media fields to WordPress user profiles
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Add social media fields to user profile
 */
function pnncle_add_social_media_fields($user) {
    // Add nonce for security
    wp_nonce_field('pnncle_save_social_media_fields', 'pnncle_social_media_nonce');
    
    // Get custom author image
    $author_image_id = get_user_meta($user->ID, 'pnncle_author_image', true);
    $author_image_url = '';
    if ($author_image_id) {
        $author_image_url = wp_get_attachment_image_url($author_image_id, 'thumbnail');
    }
    ?>
    <h3><?php esc_html_e('Author Box Plus Settings', 'pnncle-widget'); ?></h3>
    <p class="description"><?php esc_html_e('Configure your author information and social media profiles for the Author Box Plus widget.', 'pnncle-widget'); ?></p>
    
    <table class="form-table">
        <tr>
            <th><label for="pnncle_author_image"><?php esc_html_e('Custom Author Image', 'pnncle-widget'); ?></label></th>
            <td>
                <div class="pnncle-image-upload-wrapper">
                    <input type="hidden" name="pnncle_author_image" id="pnncle_author_image" value="<?php echo esc_attr($author_image_id); ?>" />
                    <div class="pnncle-image-preview" style="margin-bottom: 10px;">
                        <?php if ($author_image_url): ?>
                            <img src="<?php echo esc_url($author_image_url); ?>" style="max-width: 150px; height: auto; display: block; margin-bottom: 10px;" />
                        <?php endif; ?>
                    </div>
                    <button type="button" class="button pnncle-upload-image-button" data-uploader-title="<?php esc_attr_e('Select Author Image', 'pnncle-widget'); ?>" data-uploader-button-text="<?php esc_attr_e('Use this image', 'pnncle-widget'); ?>">
                        <?php echo $author_image_id ? esc_html__('Change Image', 'pnncle-widget') : esc_html__('Upload Image', 'pnncle-widget'); ?>
                    </button>
                    <?php if ($author_image_id): ?>
                        <button type="button" class="button pnncle-remove-image-button" style="margin-left: 10px;">
                            <?php esc_html_e('Remove Image', 'pnncle-widget'); ?>
                        </button>
                    <?php endif; ?>
                </div>
                <p class="description"><?php esc_html_e('Upload a custom image to display instead of the default avatar. If no image is uploaded, the default WordPress avatar will be used.', 'pnncle-widget'); ?></p>
            </td>
        </tr>
    </table>
    
    <h3><?php esc_html_e('Social Media Information', 'pnncle-widget'); ?></h3>
    <p class="description"><?php esc_html_e('Add your social media profiles. These will be displayed in the Author Box Plus widget.', 'pnncle-widget'); ?></p>
    <table class="form-table">
        <tr>
            <th><label for="twitter"><?php esc_html_e('X (Twitter)', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your X (formerly Twitter) handle or profile (https://x.com/username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook"><?php esc_html_e('Facebook', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your Facebook profile (https://facebook.com/username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="instagram"><?php esc_html_e('Instagram', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="instagram" id="instagram" value="<?php echo esc_attr(get_the_author_meta('instagram', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your Instagram profile (https://instagram.com/username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="threads"><?php esc_html_e('Threads', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="threads" id="threads" value="<?php echo esc_attr(get_the_author_meta('threads', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your Threads profile (https://www.threads.net/@username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php esc_html_e('LinkedIn', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="linkedin" id="linkedin" value="<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your LinkedIn profile (https://linkedin.com/in/username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="youtube"><?php esc_html_e('YouTube', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="youtube" id="youtube" value="<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your YouTube channel (https://youtube.com/@username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="pinterest"><?php esc_html_e('Pinterest', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="pinterest" id="pinterest" value="<?php echo esc_attr(get_the_author_meta('pinterest', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your Pinterest profile (https://pinterest.com/username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="tiktok"><?php esc_html_e('TikTok', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="tiktok" id="tiktok" value="<?php echo esc_attr(get_the_author_meta('tiktok', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter your TikTok profile (https://tiktok.com/@username).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="website_custom"><?php esc_html_e('Custom Website', 'pnncle-widget'); ?></label></th>
            <td>
                <input type="url" name="website_custom" id="website_custom" value="<?php echo esc_attr(get_the_author_meta('website_custom', $user->ID)); ?>" class="regular-text" /><br />
                <span class="description"><?php esc_html_e('Enter a custom website (https://yourwebsite.com).', 'pnncle-widget'); ?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'pnncle_add_social_media_fields');
add_action('edit_user_profile', 'pnncle_add_social_media_fields');

/**
 * Save social media fields
 */
function pnncle_save_social_media_fields($user_id) {
    // Verify nonce for security
    if (!isset($_POST['pnncle_social_media_nonce']) || !wp_verify_nonce($_POST['pnncle_social_media_nonce'], 'pnncle_save_social_media_fields')) {
        return false;
    }

    // Check user capabilities
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    // Save custom author image
    if (isset($_POST['pnncle_author_image'])) {
        $image_id = absint($_POST['pnncle_author_image']);
        if ($image_id > 0 && wp_attachment_is_image($image_id)) {
            // Verify attachment exists and user has permission to use it
            $attachment = get_post($image_id);
            if ($attachment && 'attachment' === $attachment->post_type) {
                // Check if current user can edit the attachment or if it's in media library
                if (current_user_can('edit_post', $image_id) || get_post_status($image_id) === 'inherit') {
                    update_user_meta($user_id, 'pnncle_author_image', $image_id);
                }
            } else {
                delete_user_meta($user_id, 'pnncle_author_image');
            }
        } else {
            delete_user_meta($user_id, 'pnncle_author_image');
        }
    }

    // Sanitize and save each field
    $fields = ['twitter', 'facebook', 'instagram', 'threads', 'linkedin', 'youtube', 'pinterest', 'tiktok', 'website_custom'];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = '';
            
            // For URL fields, validate and sanitize URL
            if (in_array($field, ['facebook', 'instagram', 'threads', 'linkedin', 'youtube', 'pinterest', 'tiktok', 'website_custom'], true)) {
                $value = esc_url_raw(wp_unslash($_POST[$field]));
                // Additional validation: ensure it's a valid URL format
                if (!empty($value) && !filter_var($value, FILTER_VALIDATE_URL)) {
                    $value = ''; // Invalid URL, don't save
                }
            } else {
                // For Twitter, allow text (username or URL)
                $value = sanitize_text_field(wp_unslash($_POST[$field]));
                // If it looks like a URL, validate it
                if (!empty($value) && filter_var($value, FILTER_VALIDATE_URL)) {
                    $value = esc_url_raw($value);
                }
            }
            
            update_user_meta($user_id, $field, $value);
        } else {
            // If field is not set, clear it (allows removing values)
            delete_user_meta($user_id, $field);
        }
    }
    
    return true;
}

/**
 * Enqueue media uploader scripts
 */
function pnncle_enqueue_media_uploader($hook) {
    // Only load on user profile pages
    $allowed_hooks = ['profile.php', 'user-edit.php'];
    if (!in_array($hook, $allowed_hooks, true)) {
        return;
    }
    
    // Check if user can edit users
    if (!current_user_can('edit_users') && !current_user_can('edit_user', get_current_user_id())) {
        return;
    }
    
    wp_enqueue_media();
    
    // Use wp_localize_script for better security instead of inline script
    $script = '
        jQuery(document).ready(function($) {
            var fileFrame;
            var $button = $(".pnncle-upload-image-button");
            var $removeButton = $(".pnncle-remove-image-button");
            var $imageInput = $("#pnncle_author_image");
            var $preview = $(".pnncle-image-preview");
            
            $button.on("click", function(e) {
                e.preventDefault();
                
                if (fileFrame) {
                    fileFrame.open();
                    return;
                }
                
                fileFrame = wp.media({
                    title: $button.data("uploader-title"),
                    button: {
                        text: $button.data("uploader-button-text")
                    },
                    multiple: false,
                    library: {
                        type: "image"
                    }
                });
                
                fileFrame.on("select", function() {
                    var attachment = fileFrame.state().get("selection").first().toJSON();
                    if (attachment && attachment.id) {
                        $imageInput.val(attachment.id);
                        if (attachment.url) {
                            var img = $("<img>").attr({
                                src: attachment.url,
                                style: "max-width: 150px; height: auto; display: block; margin-bottom: 10px;",
                                alt: ""
                            });
                            $preview.html(img);
                        }
                        $button.text("' . esc_js(__('Change Image', 'pnncle-widget')) . '");
                        if ($removeButton.length === 0) {
                            var removeBtn = $("<button>")
                                .attr("type", "button")
                                .addClass("button pnncle-remove-image-button")
                                .css("margin-left", "10px")
                                .text("' . esc_js(__('Remove Image', 'pnncle-widget')) . '");
                            $button.after(removeBtn);
                            $removeButton = $(".pnncle-remove-image-button");
                            $removeButton.on("click", function() {
                                $imageInput.val("");
                                $preview.html("");
                                $button.text("' . esc_js(__('Upload Image', 'pnncle-widget')) . '");
                                $removeButton.remove();
                            });
                        }
                    }
                });
                
                fileFrame.open();
            });
            
            if ($removeButton.length > 0) {
                $removeButton.on("click", function() {
                    $imageInput.val("");
                    $preview.html("");
                    $button.text("' . esc_js(__('Upload Image', 'pnncle-widget')) . '");
                    $removeButton.remove();
                });
            }
        });
    ';
    
    wp_add_inline_script('jquery', $script);
}
add_action('admin_enqueue_scripts', 'pnncle_enqueue_media_uploader');
add_action('personal_options_update', 'pnncle_save_social_media_fields');
add_action('edit_user_profile_update', 'pnncle_save_social_media_fields');

