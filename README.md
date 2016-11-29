# Yoda Composer for Wordpress
Yoda Composer is a compact tool for Wordpress developtment.
It makes your front-end/back-end faster! :sunglasses:

##Features:
* Composer
  * Framework: [Wordpress](https://wordpress.org/) 
  * Theme: [Yoda Loves Wordpress](https://github.com/MiguelMedeiros/yoda-loves-wordpress)
    * [Bootstrap](http://getbootstrap.com/)
    * Framework: MMW functions
  * Plugin: [Contact Form 7](https://wordpress.org/plugins/contact-form-7/)
  * Plugin: [Regenerate Thumbnails](https://wordpress.org/plugins/regenerate-thumbnails/)
  * Plugin: [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)
  * Plugin: [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
  * Plugin: [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)
* [Gulp](http://gulpjs.com/)
  * gulp-install
  * gulp-concat
  * gulp-livereload
  * gulp-rename
  * gulp-sass
  * gulp-svg-sprite
  * gulp-svg2png
  * gulp-uglify

## Requirements
* [Xampp](https://www.apachefriends.org)
* [Git](https://git-scm.com/)
* [Composer](https://getcomposer.org/)
* [NodeJS](https://nodejs.org/)

## Install Wordpress
1. Clone __Yoda Composer Wordpress__ repository to a folder.
2. At the terminal go to this folder and run the command: 

  ```
path-to-your-folder> composer install
  ```

## Install Gulp
1. At the terminal go to your theme path __Yoda Loves Wordpress__ themes and run this command:

  ```
path-to-your-folder\wordpress\wp-content\themes\yoda-loves-wordpress> composer install
  ```
2. Now you can run __gulp__ in the terminal to start Gulp Tasks!

  ```
path-to-your-folder\wordpress\wp-content\themes\yoda-loves-wordpress> gulp
  ```

Author: www.miguelmedeiros.com.br
