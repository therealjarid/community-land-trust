# Community Land Trust

Custom WordPress theme for 'Community Land Trust', a non-profit society serving as the real estate development arm of the Co-operative Housing Federation of BC. Their mission is to acquire, create and preserve affordable housing for future generations with a focus on development and redevelopment of co-operative and non-profit housing.

* #### Authors:
  * Jarid Warren [ <jaridwarren@gmail.com> ]
  * Vanessa Bertoletti [ <vanessabertoletti@gmail.com> ]
  * Einer Lim [ <einer.lim322@gmail.com> ]
  <br />
  <img src="./themes/community-land-trust/assets/images/readme-images/home-demo.gif" width="525"><img src="./themes/community-land-trust/assets/images/readme-images/mobile-home-demo.gif" width="225">
  <br />
  <br />
  <img src="./themes/community-land-trust/assets/images/readme-images/map-demo.gif" width="525"><img src="./themes/community-land-trust/assets/images/readme-images/mobile-map-demo.gif" width="225">

## Site Features

* RWD optimized from 320 - 1920px
* Responsive menu structure:
  * Hamburger menu in mobile with animated icon
  * Dropdown menu on hover in desktop
* Dynamic Google Map that displays properties entered with a custom post type
* Carousels for efficiently showing media mentions, press releases, properties, etc.
* Custom background images with company logo
* Custom 'Timeline' graphic with counting numbers on front page
* Multi-path form that directs leads according to their motivations
* Lead/Email database
* Social share functionality on press releases and media mentions
* Website is populated entirely with WordPress backend
  * menus, contact forms, social profiles, even hashtags are entered by the user


## Technology

- <img src="./themes/community-land-trust/assets/images/readme-images/js.svg" width="15"> JavaScript ES6 / <img src="./themes/community-land-trust/assets/images/readme-images/jquery.svg" width="40"> jQuery
- <img src="./themes/community-land-trust/assets/images/readme-images/wordpress.svg" width="18"> WordPress / <img src="./themes/community-land-trust/assets/images/readme-images/php.svg" width="23"> PHP
- <img src="./themes/community-land-trust/assets/images/readme-images/npm.svg" width="20"> NPM / <img src="./themes/community-land-trust/assets/images/readme-images/gulp.svg" width="10"> Gulp / <img src="./themes/community-land-trust/assets/images/readme-images/babel.svg" width="30"> Babel
- <img src="./themes/community-land-trust/assets/images/readme-images/sass.svg" width="20"> Sass / <img src="./themes/community-land-trust/assets/images/readme-images/css3.svg" width="12"> CSS3

## Code Sample

This code excerpt dynamically changes the zoom of the Google Map depending on what pins have been populated. The code measures the horizontal and vertical bounds of the map, then depending on the resolution of the map on the page, changes the zoom accordingly.

The zoom is an interger, so the last line of code removes the decimal place.

`GLOBE_WIDTH` is a constant defined by the Google Maps API, as the base width of the map when zoomed completely out (256px).

```javascript
function calculateZoom(bounds) {
    const GLOBE_WIDTH = 256;
    let angle = bounds.maxLng - bounds.minLng;
    let angle2 = bounds.maxLat - bounds.minLat;
    let delta = -0.5;
    if (angle2 > angle) {
      angle = angle2;
      delta = 2.5;
    }
    if (angle < 0) {
      angle += 360;
    }

    return Math.floor(
      Math.log(($('#map-canvas').width() * 360) / angle / GLOBE_WIDTH) /
        Math.LN2 -
        delta
    );
  }

```

## Setup

**Install WordPress:**

- [Download Wordpress](https://wordpress.org/latest.zip) and place directory at root of server (you'll need a tool like [MAMP](https://www.mamp.info/en/) if you wish to host locally)
- Replace `themes`, `plugins` and `uploads` folders from install with ones in this repo

The following should be done in `themes/community-land-trust/`

**Initialize NPM:**

`> npm init`

**Install Gulp:**

`> npm install`

**Convert Sass files to CSS:**

`> gulp sass`

**Call Babel & Uglify on JS files:**

`> gulp scripts`

**Launch Browser-Sync to automatically update changes:**

`> gulp browser-sync`

**Watch changes to Sass/JS and automatically run scripts/sass:**

`> gulp watch` or `gulp`
