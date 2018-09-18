# Community Land Trust

#### Authors: Jarid Warren [ <jaridwarren@gmail.com> ], Vanessa Bertoletti [ <vanessabertoletti@gmail.com> ], Einer Lim [ <einer.lim322@gmail.com> ]

## Motivation

## Technology

- <img src="./themes/community-land-trust/assets/images/readme-images/js.svg" width="15"> JavaScript ES6 / <img src="./themes/community-land-trust/assets/images/readme-images/jquery.svg" width="40"> jQuery
- <img src="./themes/community-land-trust/assets/images/readme-images/wordpress.svg" width="18"> WordPress / <img src="./themes/community-land-trust/assets/images/readme-images/php.svg" width="23"> PHP
- <img src="./themes/community-land-trust/assets/images/readme-images/npm.svg" width="20"> NPM / <img src="./themes/community-land-trust/assets/images/readme-images/gulp.svg" width="10"> Gulp / <img src="./themes/community-land-trust/assets/images/readme-images/babel.svg" width="30"> Babel
- <img src="./themes/community-land-trust/assets/images/readme-images/sass.svg" width="20"> Sass / <img src="./themes/community-land-trust/assets/images/readme-images/css3.svg" width="12"> CSS3

## Code Sample

```javascript
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
