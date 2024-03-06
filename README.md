# WordPress Starter Theme

A lightweight theme using Advanced Custom Fields Pro and ACF Blocks

## Initial Setup

First install the necessary node_modules by running `npm install`

For local development, you'll first want to change the name of the theme in package.json. 

Rename the .env.example file to .env and declare the proxy_url for the gulp server to run on.

## Building for deployment
Running ```gulp build --prod``` will create a package of all theme files in the bundled directory. This ZIP can be uploaded directly in WordPress to update the theme.
