# Quick Installation Guide

## Step-by-Step Installation

### 1. Install the Plugin

**Option A: Via WordPress Admin**
1. Zip the entire `pnncle-widget` folder
2. Go to WordPress Admin → Plugins → Add New → Upload Plugin
3. Upload the ZIP file
4. Click "Activate Plugin"

**Option B: Via FTP/SFTP**
1. Upload the `pnncle-widget` folder to `/wp-content/plugins/`
2. Go to WordPress Admin → Plugins
3. Find "PNNCLE Author Social Links Widget" and click "Activate"

### 2. Verify Requirements

Make sure you have:
- ✅ WordPress 5.0+
- ✅ Elementor 3.0.0+ (installed and activated)
- ✅ PHP 7.4+

### 3. Add Social Media to Author Profiles

1. Go to **Users → All Users**
2. Click **Edit** on any author
3. Scroll to **"Social Media Information"** section
4. Fill in the social media URLs you want to display
5. Click **Update User**

**Example URLs:**
- Twitter: `@username` or `https://twitter.com/username`
- Facebook: `https://facebook.com/username`
- Instagram: `https://instagram.com/username`
- LinkedIn: `https://linkedin.com/in/username`
- YouTube: `https://youtube.com/@username`
- And so on...

### 4. Add Widget to Your Page

1. **Edit any page/post** with Elementor
2. In Elementor panel, **search for "Author Social Links"**
3. **Drag the widget** into your page
4. **Customize** using the Elementor controls:
   - Content tab: Layout, author info, icon style
   - Style tab: Colors, spacing, typography

### 5. Publish and Test

1. Click **Update/Publish**
2. View the page on the frontend
3. Verify social links appear correctly
4. Test clicking the links

## Troubleshooting

**Widget not showing?**
- Clear Elementor cache: Elementor → Tools → Regenerate CSS
- Ensure you're on a post/page with an author assigned

**No links appearing?**
- Check that social media URLs are added in user profile
- Verify you're viewing a post with an author

**Styling issues?**
- Regenerate CSS in Elementor → Tools
- Check for theme conflicts

## Need Help?

Refer to the main README.md for detailed documentation.

