# Game Showcase WordPress Plugin - Installation Guide

## Quick Start

### Step 1: Installation

1. Download all plugin files from this package
2. Create a folder: `wp-content/plugins/game-showcase/`
3. Upload all files maintaining the directory structure:
   ```
   wp-content/plugins/game-showcase/
   ├── game-showcase.php
   ├── README.md
   ├── includes/
   │   ├── post-type.php
   │   ├── taxonomy.php
   │   ├── admin.php
   │   ├── frontend.php
   │   └── metabox.php
   └── assets/
       ├── css/
       │   ├── style.css
       │   └── admin.css
       └── js/
           ├── script.js
           └── admin.js
   ```

### Step 2: Activate Plugin

1. Go to WordPress Dashboard
2. Navigate to **Plugins**
3. Find "Game Showcase"
4. Click **Activate**

### Step 3: Add Your First Game

1. Go to **Games** in the left menu
2. Click **Add New Game**
3. Enter game title (e.g., "The Witcher 3: Wild Hunt")
4. Add game description in the editor
5. Set featured image (game artwork)
6. Scroll down to **Game Details** section
7. Fill in:
   - Developer: CD Projekt Red
   - Genres: Action, RPG, Adventure
   - Rating: 4.9
   - Price: $59.99
   - Buy Link: https://example.com/buy
   - Status: Available
8. Select category: Action
9. Click **Publish**

### Step 4: Create Game Categories

1. Go to **Games > Categories**
2. Create these categories:
   - Action
   - RPG
   - Adventure
   - Indie
   - Puzzle
   - Strategy
   - Sports

### Step 5: Add Shortcode to Page

1. Create or edit a page
2. Add shortcode: `[game_showcase]`
3. Publish and view

### Step 6: Configure Settings (Optional)

1. Go to **Games > Settings**
2. Adjust:
   - Items per page: 12
   - Items in carousel: 4
   - Enable autoplay: Yes
   - Show dots: Yes
   - Show arrows: Yes

## Popular Shortcode Examples

### Display all games as carousel (default)
```
[game_showcase]
```

### Display grid view (recommended for many games)
```
[game_showcase view="grid"]
```

### Show only Action games
```
[game_showcase category="action"]
```

### Show 8 games only
```
[game_showcase limit="8"]
```

### Combine multiple filters
```
[game_showcase category="action" limit="12" view="grid"]
```

### Sorted by newest first
```
[game_showcase orderby="date" order="DESC"]
```

## Features Checklist

✅ **Admin Dashboard**
- Add/Edit/Delete games
- Manage game categories
- Set game prices and ratings
- Configure plugin settings
- Add game images

✅ **Game Details**
- Title
- Description
- Developer/Studio
- Genres
- Star rating (0-5)
- Regular price
- Sale price
- Buy link
- Status badge (Available, Coming Soon, Popular, New)

✅ **Frontend Display**
- Modern dark theme
- Responsive design
- Smooth animations
- Slick carousel
- Grid view
- Category filtering
- Search functionality
- Rating display
- Price display with sale pricing

✅ **Customization**
- Easy color customization via CSS
- Carousel speed adjustable
- Multiple view modes
- Responsive breakpoints

## Troubleshooting

### Games not showing?
1. Make sure you've added games and published them
2. Check that games have categories assigned
3. Verify shortcode is on published page
4. Clear cache if using caching plugin

### Carousel not working?
1. Check browser console for errors
2. Ensure jQuery is loaded
3. Verify Slick CDN is accessible
4. Try disabling other plugins temporarily

### Images not displaying?
1. Make sure featured image is set for each game
2. Check image file permissions
3. Verify image URL is correct
4. Try re-uploading the image

### Styling looks broken?
1. Clear browser cache (Ctrl+Shift+Delete)
2. Check if WordPress admin CSS is interfering
3. Verify plugin CSS is loading
4. Disable CSS minification plugins temporarily

## Admin Menu Structure

```
Dashboard
├── Games
│   ├── All Games
│   ├── Add New
│   ├── Categories
│   └── Settings
```

## Database Tables & Meta Keys

Game post meta keys stored:
- `gs_price` - Regular price
- `gs_sale_price` - Sale/discounted price
- `gs_buy_link` - Link to purchase
- `gs_rating` - Star rating (0-5)
- `gs_developer` - Developer/studio name
- `gs_genres` - Game genres
- `gs_status` - Status badge

## Performance Tips

1. **Use grid view** for more than 20 games
2. **Limit carousel items** to 4-6 for better performance
3. **Optimize images** before upload (max 2MB recommended)
4. **Enable WordPress caching** for better performance
5. **Use featured images** consistently

## Browser Compatibility

✅ Chrome/Edge (latest)
✅ Firefox (latest)
✅ Safari (latest)
✅ Mobile browsers (iOS Safari, Chrome Mobile)

## Mobile Responsiveness

- **Desktop:** 4 items in carousel, full grid
- **Tablet:** 2-3 items in carousel
- **Mobile:** 1 item in carousel

## Next Steps

1. Add 5-10 games to test the plugin
2. Customize colors in `style.css` if desired
3. Create a games showcase page
4. Configure plugin settings
5. Test on mobile devices
6. Enable website caching for performance

## Support Resources

- WordPress Plugin Repository (if published)
- Plugin documentation
- Code comments throughout files
- Template examples in README.md

---

**Need Help?** Review the README.md file for detailed documentation or check the comments in the plugin code.
