# PNNCLE Author Social Links Widget

A custom Elementor widget that dynamically displays author social media links. This widget extends the functionality of the standard AuthorBox by automatically reading and displaying social media networks associated with the post author.

## Features

- **Dynamic Social Media Links**: Automatically displays social media links from the author's profile
- **Multiple Platforms**: Supports Twitter, Facebook, Instagram, LinkedIn, YouTube, Pinterest, TikTok, GitHub, and custom websites
- **Flexible Display Options**:
  - Show/hide author information (name, avatar, bio)
  - Horizontal or vertical layout
  - Icon only, text only, or icon + text display
  - Customizable colors, spacing, and styling
- **User Profile Integration**: Easy-to-use fields in WordPress user profiles for adding social media links
- **Fully Customizable**: Extensive Elementor controls for styling and layout
- **Responsive**: Works perfectly on all device sizes

## Installation

### Method 1: Manual Installation

1. **Download or Clone** this repository to your WordPress plugins directory:
   ```bash
   cd wp-content/plugins
   git clone [your-repo-url] pnncle-author-social-widget
   ```

2. **Activate the Plugin**:
   - Go to WordPress Admin → Plugins
   - Find "PNNCLE Author Social Links Widget"
   - Click "Activate"

3. **Verify Elementor is Installed**:
   - This plugin requires Elementor to be installed and activated
   - Minimum Elementor version: 3.0.0
   - Minimum PHP version: 7.4

### Method 2: ZIP Installation

1. Create a ZIP file of the plugin directory
2. Go to WordPress Admin → Plugins → Add New → Upload Plugin
3. Upload the ZIP file and activate

## Setup Instructions

### Step 1: Add Social Media Links to User Profiles

1. Go to **Users → All Users** in WordPress admin
2. Click **Edit** on any user (or your own profile)
3. Scroll down to the **"Social Media Information"** section
4. Add your social media URLs:
   - **Twitter**: Enter `@username` or full URL (e.g., `https://twitter.com/username`)
   - **Facebook**: Enter full URL (e.g., `https://facebook.com/username`)
   - **Instagram**: Enter full URL (e.g., `https://instagram.com/username`)
   - **LinkedIn**: Enter full URL (e.g., `https://linkedin.com/in/username`)
   - **YouTube**: Enter full URL (e.g., `https://youtube.com/@username`)
   - **Pinterest**: Enter full URL (e.g., `https://pinterest.com/username`)
   - **TikTok**: Enter full URL (e.g., `https://tiktok.com/@username`)
   - **GitHub**: Enter full URL (e.g., `https://github.com/username`)
   - **Custom Website**: Enter any custom website URL
5. Click **Update User** to save

### Step 2: Add Widget to Your Elementor Page

1. **Edit a Page/Post** with Elementor
2. In the Elementor panel, search for **"Author Social Links"**
3. **Drag and drop** the widget into your desired section
4. **Configure the widget**:
   - **Content Tab**:
     - Toggle "Show Author Info" to display author name, avatar, and bio
     - Choose author name format (Display Name, First Name, etc.)
     - Set avatar size
     - Choose layout (Horizontal/Vertical)
     - Select icon style (Icon only, Text only, or Both)
   - **Style Tab**:
     - Customize colors, typography, spacing
     - Adjust icon sizes
     - Add borders, shadows, and hover effects

### Step 3: Customize Styling

The widget includes extensive styling options in Elementor:
- **Author Info Styling**: Name color, typography, bio styling
- **Social Links Styling**: Icon size, spacing, padding, colors, borders, shadows
- **Hover Effects**: Custom hover colors and transitions

## Supported Social Media Platforms

- Twitter
- Facebook
- Instagram
- LinkedIn
- YouTube
- Pinterest
- TikTok
- GitHub
- Custom Website

## How It Works

1. The widget automatically detects the author of the current post/page
2. It retrieves social media links from the author's user profile meta fields
3. Only platforms with links are displayed
4. Links open in a new window (configurable) with proper security attributes

## Customization

### Adding More Social Platforms

To add more social media platforms:

1. Edit `includes/user-profile-fields.php`:
   - Add a new field in the `pnncle_add_social_media_fields()` function
   - Add the save logic in `pnncle_save_social_media_fields()`

2. Edit `widgets/author-social-links-widget.php`:
   - Add the platform to the `$platforms` array in `get_author_social_links()`
   - Add an icon SVG to the `get_social_icon()` method
   - Add CSS styling in `assets/css/widget.css` if needed

### Hooks and Filters

The plugin is built with extensibility in mind. You can use WordPress hooks to customize behavior:

```php
// Filter social links before display
add_filter('pnncle_author_social_links', function($links, $author_id) {
    // Modify $links array
    return $links;
}, 10, 2);
```

## Requirements

- WordPress 5.0 or higher
- Elementor 3.0.0 or higher
- PHP 7.4 or higher

## Troubleshooting

### Widget Not Appearing in Elementor

1. Ensure Elementor is installed and activated
2. Check that you're using Elementor 3.0.0 or higher
3. Clear Elementor cache: Elementor → Tools → Regenerate CSS
4. Clear browser cache

### Social Links Not Showing

1. Verify social media links are added in the user profile
2. Check that you're viewing a post/page with an assigned author
3. Ensure the author has at least one social media link filled in

### Styling Issues

1. Clear Elementor cache
2. Regenerate CSS in Elementor → Tools
3. Check for CSS conflicts with your theme

## Support

For issues, questions, or contributions, please:
- Open an issue on GitHub
- Contact the plugin developer

## Changelog

### Version 1.0.0
- Initial release
- Support for 9 social media platforms
- Full Elementor integration
- User profile fields for social media
- Extensive customization options

## License

This plugin is provided as-is for use with Elementor. Please ensure compliance with Elementor's terms of service.

## Credits

Built for Elementor using the [Elementor Widget Development Documentation](https://developers.elementor.com/docs/widgets/).

