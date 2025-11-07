# Game Showcase WordPress Plugin

A modern, responsive WordPress plugin for displaying games with a sleek design and powerful dashboard management system.

## Features

✨ **Core Features**
- Custom "Games" post type with full WordPress integration
- Game categories and tags for organization
- Advanced metabox for game details (price, developer, rating, etc.)
- Modern, responsive card-based design
- Slick carousel implementation for featured games
- Dashboard settings page for customization
- WooCommerce-ready pricing system
- Status badges (Available, Coming Soon, Popular, New)
- Star rating system
- Buy links integration

🎨 **Design Features**
- Dark modern theme with gradient backgrounds
- Smooth hover animations and transitions
- Mobile-first responsive design
- Touch-friendly controls
- Beautiful status badges with backdrop blur
- Dynamic rating display
- Category tag system

⚙️ **Functionality**
- Customizable carousel settings (autoplay, dots, arrows)
- Grid and carousel view modes
- Multiple sorting options (date, title, rating)
- Category filtering
- SEO-friendly URL structure
- REST API support
- Admin-friendly interface

## Installation

1. Download the plugin files
2. Upload to `/wp-content/plugins/game-showcase/`
3. Activate the plugin through WordPress admin
4. Go to Games menu to start adding games

## Directory Structure

```
game-showcase/
├── game-showcase.php           # Main plugin file
├── includes/
│   ├── post-type.php          # Custom post type registration
│   ├── taxonomy.php           # Categories taxonomy
│   ├── metabox.php            # Game details metabox
│   ├── admin.php              # Admin settings page
│   └── frontend.php           # Frontend display functions
├── assets/
│   ├── css/
│   │   ├── style.css          # Frontend styles
│   │   └── admin.css          # Admin styles
│   └── js/
│       ├── script.js          # Frontend JavaScript
│       └── admin.js           # Admin JavaScript
└── README.md                  # This file
```

## Usage

### Adding Games

1. Go to **Games** menu in WordPress admin
2. Click **Add New Game**
3. Fill in:
   - Game title
   - Game description/content
   - Featured image (game artwork)
   - Select categories
4. In the **Game Details** metabox, add:
   - Developer/Studio name
   - Genres (comma-separated)
   - Rating (0-5 stars)
   - Price
   - Sale price (optional)
   - Buy link
   - Status (Available, Coming Soon, Popular, New)

### Managing Categories

1. Go to **Games > Categories**
2. Create categories like: Action, RPG, Adventure, Indie, etc.
3. Assign categories to games during creation

### Plugin Settings

1. Go to **Games > Settings**
2. Configure:
   - Items per page (pagination)
   - Items in carousel (how many to show at once)
   - Carousel autoplay
   - Show/hide dots
   - Show/hide navigation arrows

### Display on Frontend

#### Using Shortcodes

Basic carousel display:
```
[game_showcase]
```

Display specific category:
```
[game_showcase category="action"]
```

Grid view instead of carousel:
```
[game_showcase view="grid"]
```

Limit number of games:
```
[game_showcase limit="8"]
```

Sort by rating (descending):
```
[game_showcase orderby="meta_value_num" meta_key="gs_rating" order="DESC"]
```

Combined example:
```
[game_showcase category="action" limit="12" view="grid" orderby="date" order="DESC"]
```

#### Shortcode Attributes

- `category` - Filter by category slug
- `limit` - Number of games to display (default: 12)
- `orderby` - Sort by: date, title, meta_value (default: date)
- `order` - Sort order: ASC or DESC (default: DESC)
- `view` - Display mode: carousel or grid (default: carousel)

## Customization

### CSS Variables

Edit `style.css` to customize colors:

```css
:root {
    --primary-color: #6c5ce7;      /* Main accent color */
    --secondary-color: #00b894;    /* Positive/success color */
    --dark-bg: #0d0d0d;            /* Background */
    --card-bg: #1a1a1a;            /* Card background */
    --text-primary: #ffffff;       /* Main text */
    --text-secondary: #b0b0b0;     /* Secondary text */
    --accent: #ff6b6b;             /* Alert/sale color */
}
```

### Carousel Settings

Modify carousel options in `assets/js/script.js`:

```javascript
$('.game-showcase-carousel').slick({
    slidesToShow: 4,        // Number of slides visible
    autoplaySpeed: 5000,    // Milliseconds between slides
    speed: 500              // Animation speed
});
```

### Game Card Template

Edit the `game_showcase_game_card()` function in `includes/frontend.php` to customize the card layout.

## Hooks and Filters

### Actions

- `game_showcase_before_card` - Before game card output
- `game_showcase_after_card` - After game card output

### Filters

- `game_showcase_card_classes` - Filter game card CSS classes
- `game_showcase_game_query_args` - Filter WP_Query arguments

## Requirements

- WordPress 5.0+
- PHP 7.2+
- jQuery (included with WordPress)

## Compatibility

- ✅ WooCommerce compatible (for e-commerce integration)
- ✅ Multisite compatible
- ✅ REST API supported
- ✅ Gutenberg compatible
- ✅ Mobile responsive

## FAQ

**Q: Can I use this with WooCommerce?**
A: Yes! You can link to WooCommerce product pages using the "Buy Link" field.

**Q: How do I change the carousel speed?**
A: Edit `assets/js/script.js` and modify the `autoplaySpeed` and `speed` values.

**Q: Can I customize the colors?**
A: Yes! Edit the CSS variables in `assets/css/style.css` or override them in your theme's CSS.

**Q: How do I filter games by category?**
A: Use the shortcode: `[game_showcase category="action"]`

**Q: Is this mobile responsive?**
A: Yes! The plugin is fully responsive for all device sizes.

## Support

For issues or feature requests, please check the WordPress plugin repository or contact support.

## License

GPL v2 or later - See LICENSE file for details

---

**Version:** 1.0.0
**Last Updated:** 2025
