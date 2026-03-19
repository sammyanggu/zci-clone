# ZCI (Z-Connect) Project Analysis

## 📋 Project Overview
**Project Name:** Z-Connect (ZCI)  
**Type:** Corporate Website / Company Portfolio  
**Primary Language:** PHP (Backend), HTML/CSS/JavaScript (Frontend)  
**Framework:** Bootstrap 5, Vanilla JavaScript with jQuery  
**Build Tools:** SASS (SCSS), Gulp, Nodemon  
**Server:** XAMPP (Apache + PHP)  

---

## 🏗️ Project Structure

### Root Directory Files
```
├── index.php                              # Main homepage
├── about-us.php                           # About us page
├── services.php                           # Services listing page
├── service-single.php                     # Single service detail page
├── contact-us.php                         # Contact us page
├── our-team.php                           # Team members page
├── Team-Member_Sofronio-P-Castillo-III.php # Individual team member page
├── flaticons.html                         # Icon reference page
├── robots.txt                             # SEO robots configuration
├── package.json                           # NPM dependencies & scripts
└── package-lock.json                      # Locked dependency versions
```

### Directory Organization

#### **_src/** - Source Files
```
_src/scss/
├── main-LTR.scss                          # Main LTR (Left-to-Right) styles entry
├── main-RTL.scss                          # Main RTL (Right-to-Left) styles entry
├── _main.scss                             # Main SCSS imports and configuration
├── 0-configs/
│   ├── _direction-LTR.scss               # LTR direction variables
│   └── _direction-RTL.scss               # RTL direction variables
├── 1-helpers/
│   ├── _variables.scss                   # Color, font, and design variables
│   ├── _mixins.scss                      # SCSS mixins for reusable styles
│   ├── _globals.scss                     # Global CSS rules
│   ├── _custom-animations.scss           # Custom animation definitions
│   └── _dark-theme.scss                  # Dark theme styling
├── 2-components/
│   ├── _breadcrumb.scss                  # Breadcrumb component
│   ├── _buttons.scss                     # Button styles
│   ├── _forms.scss                       # Form input styles
│   ├── _header-search-box.scss          # Header search component
│   └── [More component styles...]
└── 3-layout/
    └── [Layout specific styles...]
```

#### **assets/** - Static Assets
```
assets/
├── images/                                # Template/placeholder images
│   ├── about/
│   ├── blog/
│   ├── clients-logos/
│   ├── fav-icon/
│   ├── hero/
│   ├── icons/
│   ├── our-team/
│   ├── portfolio/
│   ├── sections-bg-images/
│   ├── services/
│   └── testimonials/
├── images-placeholders/                   # Placeholder images (same structure)
└── images-zconnect/                       # Actual Z-Connect brand images
    ├── about-us/
    ├── clients-logos/
    ├── company-certs/
    ├── employee-certificates/
    ├── index-page/
    ├── logo/
    ├── mission-vision-values/
    ├── partner-logos/
    └── services/

videos/
└── [Video files for website]
```

#### **css/** - Compiled CSS
```
css/
├── main-LTR.css                           # Compiled LTR styles
├── main-RTL.css                           # Compiled RTL styles
├── vendors/                               # Third-party CSS libraries
│   ├── bootstrap.min.css
│   ├── animate.css
│   ├── swiper-bundle.min.css
│   ├── jquery.fancybox.min.css
│   ├── nice-select.css
│   ├── odometer-theme-default.css
│   ├── splitting.css
│   ├── splitting-cells.css
│   ├── vegas.min.css
│   ├── all.min.css (FontAwesome)
│   ├── bootstrap-icons-1.9.1/
│   ├── flaticon/
│   └── webfonts/
```

#### **js/** - JavaScript Files
```
js/
├── main.js                                # Custom JavaScript (811 lines)
└── vendors/                               # Third-party JavaScript libraries
    ├── jquery-3.6.1.min.js
    ├── bootstrap.bundle.min.js
    ├── swiper-bundle.min.js
    ├── jquery.fancybox.min.js
    ├── vanilla-tilt.min.js
    ├── wow.min.js
    ├── particles.min.js
    ├── splitting.min.js
    ├── appear.min.js
    ├── isotope-min.js
    ├── jquery.ajaxchimp.min.js
    ├── jquery.countTo.js
    ├── swiper-bundle.min.js.map
    ├── bootstrap.bundle.min.js.map
    └── particles-json-files/
```

#### **inc/** - PHP Includes (Reusable Components)
```
inc/
├── header-section.php                     # Navigation header
├── footer-section.php                     # Footer section
├── social-media-links.php                 # Social media icons
├── about-us-section.php                   # About us section
├── services-section.php                   # Services section
├── our-team-section.php                   # Team member listings
├── our-clients-section.php                # Clients/partners section
├── testimonials-section.php               # Client testimonials
├── portfolio-slider-section.php           # Portfolio/projects slider
├── our-stats-section.php                  # Statistics section
├── why-choose-us-section.php             # Key benefits section
├── mission-values-vision_section.php     # Company mission/vision
├── certifications-section.php             # Certifications display
├── faq-section.php                        # FAQ section
└── take-action-section.php               # CTA (Call-to-Action) section
```

#### **php/** - Backend Logic
```
php/
└── send-mail.php                          # Email form submission handler
```

---

## 🔧 Technology Stack

### **Backend**
- **PHP 5.2+** - Server-side templating and logic
- **Mail Function** - Built-in PHP mail() for sending contact forms

### **Frontend**
- **HTML5** - Semantic markup
- **SCSS/SASS** - CSS preprocessing
- **JavaScript (Vanilla + jQuery)** - Client-side interactivity
- **Bootstrap 5** - Responsive grid and components

### **CSS Frameworks & Libraries**
| Library | Purpose |
|---------|---------|
| Bootstrap 5 | Responsive grid, components, utilities |
| Bootstrap Icons | Icon library |
| Flaticon | Additional icon library |
| FontAwesome | Font-based icons |
| Animate.css | CSS animations |
| Swiper | Touch slider/carousel |
| Fancybox | Lightbox image gallery |
| Splitting.css | Text animation/splitting |
| Vegas.js | Full-page background effects |
| Odometer | Animated number counter |
| Nice Select | Custom select dropdown styling |

### **JavaScript Libraries**
| Library | Purpose |
|---------|---------|
| jQuery 3.6.1 | DOM manipulation, utilities |
| Swiper | Touch slider functionality |
| Vanilla Tilt | 3D tilt effect on hover |
| WOW.js | Scroll animation triggers |
| Particles.js | Animated particle background |
| Isotope | Portfolio grid filtering/sorting |
| Splitting.js | Advanced text animations |
| AjaxChimp | Mailchimp integration |
| CountTo | Animated counter numbers |
| Appear.js | Element visibility detection |
| Fancybox | Lightbox gallery |

### **Build Tools**
- **SASS 1.77.6** - CSS preprocessing
- **Gulp 5.0.0** - Task automation (optional)
- **Gulp-SASS 5.1.0** - Gulp plugin for SASS compilation
- **Nodemon 3.1.4** - Auto-restart scripts on file changes
- **npm** - Package management

---

## 💾 Backend Architecture

### **PHP Approach**
- **Template-based**: Uses PHP includes for reusable sections
- **Server-side rendering**: Pages are generated on the server
- **No database**: Static content-based website
- **Form processing**: Simple mail() function for contact forms

### **Form Handling**
**File:** `php/send-mail.php`

**Features:**
- Validates POST requests
- Email address validation using `filter_var()`
- Input sanitization to prevent email injection
- Pattern matching to detect header injection attempts
- Sends HTML-formatted emails to: `web-sales@zconnect.ph`

**Email Headers:**
```php
From: User Name <user@email.com>
MIME-Version: 1.0
Content-type: text/html; charset=UTF-8
```

---

## 🎨 Styling Architecture

### **SCSS Organization (7-1 Pattern)**
The project uses a modified 7-1 SCSS architecture:

#### **0-configs/** - Configuration
- Direction-specific variables (LTR/RTL)
- Base configuration settings

#### **1-helpers/** - Utilities
- **_variables.scss**: 
  - Color palette (main: #1073ac, secondary: #4820a7, etc.)
  - Font family variables
  - Design breakpoints
  - Custom SCSS functions

- **_mixins.scss**: Reusable SCSS mixins
- **_globals.scss**: Global CSS rules
- **_custom-animations.scss**: Keyframe animations
- **_dark-theme.scss**: Dark mode styles

#### **2-components/** - Reusable Components
- Buttons, forms, breadcrumbs
- Search boxes, headers
- Individual component styling

#### **3-layout/** - Page Layouts
- Page-specific layouts
- Container structures
- Grid arrangements

### **Dual Language Support (LTR/RTL)**
- `main-LTR.css` - English (Left-to-Right)
- `main-RTL.css` - Arabic (Right-to-Left)
- Different direction variables for each layout

### **Theme System**
```javascript
// Dark/Light theme toggle
- localStorage storage for persistence
- Default: Dark theme
- Classes: .dark-theme, .light-theme
- Theme switching via .mode-switcher element
```

---

## 📄 Page Structure

### **Main Pages**
1. **index.php** - Homepage
   - Hero slider with video background
   - Responsive design
   - Social media integration
   - Call-to-action buttons

2. **services.php** - Services listing
   - Inner page hero section
   - Service categories

3. **service-single.php** - Individual service detail

4. **about-us.php** - Company information

5. **our-team.php** - Team members listing

6. **contact-us.php** - Contact form

7. **Team-Member_*.php** - Individual team member profiles

8. **flaticons.html** - Icon reference/demo

### **Common Sections** (inc/ files)
- Header with navigation
- Footer with links/info
- Social media links
- About us section
- Services section
- Team member cards
- Client testimonials
- Portfolio slider
- Statistics counter
- FAQ accordion
- Certification display
- Mission/Vision/Values

---

## 🚀 Build Process

### **SASS Compilation**
```json
{
  "scripts": {
    "build:scss": "sass _src/scss/main-LTR.scss:css/main-LTR.css",
    "watch:scss": "nodemon -e scss -x \"npm run build:scss\""
  }
}
```

### **How to Compile Styles**
```bash
# One-time compilation
npm run build:scss

# Watch mode (auto-compile on changes)
npm run watch:scss
```

---

## 🎯 Key Features

### **Frontend Features**
- ✅ Responsive design (Bootstrap 5)
- ✅ Dark/Light theme toggle
- ✅ Smooth scroll animations
- ✅ Touch-friendly sliders (Swiper)
- ✅ Image lightbox gallery
- ✅ Portfolio grid with filtering (Isotope)
- ✅ Parallax effects
- ✅ 3D tilt effects on cards
- ✅ Animated counters
- ✅ Text splitting animations
- ✅ Particle background effects
- ✅ Header search box

### **Backend Features**
- ✅ Contact form validation
- ✅ Email sanitization (prevent injection)
- ✅ HTML email formatting
- ✅ Server-side form processing

---

## 📊 Performance & SEO

### **SEO Features**
- Semantic HTML5
- Meta descriptions on pages
- robots.txt for crawler control
- Open Graph meta tags
- Mobile-first responsive design

### **Performance Libraries**
- Minified vendor libraries
- Source map files for debugging
- Lazy loading support (Appear.js)
- Image optimization directories

---

## 🔐 Security Notes

### **Form Security**
✅ Email validation using `filter_var()`  
✅ Input sanitization  
✅ Header injection prevention  
✅ Pattern-based detection for suspicious inputs  

### **Recommendations**
- Consider adding CSRF tokens for production
- Implement rate limiting on contact form
- Use environment variables for recipient email
- Consider database storage for form submissions

---

## 🎓 Development Workflow

### **Setting Up Development**
```bash
# 1. Install dependencies
npm install

# 2. Start watching SCSS files
npm run watch:scss

# 3. Serve via XAMPP
# Access at: http://localhost/zci-clone/ZCI/

# 4. Make SCSS changes in _src/scss/
# Changes auto-compile to css/main-LTR.css and main-RTL.css
```

### **File Editing Guidelines**
- **Edit SCSS files** in `_src/scss/` directory
- **Never edit compiled CSS** directly (changes will be overwritten)
- **Edit HTML/PHP** directly in root or `inc/` directories
- **Add images** to `assets/images-zconnect/`

---

## 📦 Dependencies Summary

### **Production Dependencies**
- nodemon: 3.1.4 (Development tool)

### **Development Dependencies**
- gulp: 5.0.0
- gulp-sass: 5.1.0
- sass: 1.77.6

### **Vendor Libraries** (Included in /css/vendors and /js/vendors)
- Bootstrap 5, jQuery, Swiper, WOW.js, Particles.js, FontAwesome, Flaticon, and 10+ others

---

## 🌍 Internationalization (i18n)

### **Language Support**
- **LTR Version**: English (main-LTR.css)
- **RTL Version**: Arabic support ready (main-RTL.scss exists)
- **Font Support**: 
  - LTR: Jost (Google Fonts)
  - RTL: Tajawal (for Arabic)

---

## 📝 Color Palette

| Color Name | Hex Value | Usage |
|-----------|-----------|--------|
| Main | #1073ac | Primary buttons, links, accents |
| Secondary | #4820a7 | Secondary elements |
| Header | #fcfc3a | Header highlights |
| Accent | #0d1857 | Accent elements |
| Success | #217234 | Success messages |
| Danger | #fc0000 | Error messages |
| Warning | #9b6a01 | Warning messages |
| Dark Blue | #060922 | Dark backgrounds |
| Grey | #f1f1f1 | Light backgrounds |

---

## 📱 Responsive Breakpoints
Managed via Bootstrap 5 defaults and custom SCSS variables in `_variables.scss`

---

## 🔄 Version Information
- **Project Version**: 1.0.0
- **SASS Version**: 1.77.6
- **Bootstrap Version**: 5
- **jQuery Version**: 3.6.1
- **PHP Version**: 5.2+ required

---

## 📞 Contact Configuration
**Default Email Recipient**: `web-sales@zconnect.ph`  
**Email Sending Method**: PHP mail() function

---

## 🎯 Project Type Classification
- **Category**: Corporate/Service Website
- **Industry**: IT Solutions & Business Services
- **Region**: Philippines (Language: en-PH)
- **Design Pattern**: Template-based PHP with component includes
- **Architecture**: Server-side rendering, no database

---

**Last Updated**: March 2, 2026  
**Repository**: ZCI (sammyanggu/ZCI)  
**Current Branch**: main
