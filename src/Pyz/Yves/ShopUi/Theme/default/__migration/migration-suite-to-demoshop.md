# Atomic Frontend: integration guide for demoshop

1. `./assets/Yves/default/app/index.js`

Append the following lines:
```js
var app = require('ShopUi/app');
app.bootstrap();
```

2. `./assets/Yves/default/vendor.entry.js`

Remove the following lines:
```js
// es6 promise fix (webpack 2)
require('es6-promise/auto');
```

Append the following lines:
```js
require('@webcomponents/webcomponentsjs/webcomponents-bundle');
```

3. `./package.json`

Update the script section as follows:
```json
"scripts": {
    "yves": "node ./assets/Yves/default/build/build development",
    "yves:watch": "node ./assets/Yves/default/build/build development-watch",
    "yves:production": "node ./assets/Yves/default/build/build production",
    "zed": "node ./node_modules/@spryker/oryx-for-zed/build",
    "zed:dev": "node ./node_modules/@spryker/oryx-for-zed/build --dev",
    "zed:prod": "node ./node_modules/@spryker/oryx-for-zed/build --prod"
}
```

Update the engine section as follows:
```json
"engines": {
    "node": ">=8.9.0",
    "npm": ">=5.6.0"
}
```

Update the dependencies section as follows:
```json
"dependencies": {
    "@webcomponents/webcomponentsjs": "~2.0.2",
    "core-js": "~2.5.7",
    "font-awesome": "~4.7.0",
    "foundation-sites": "~6.3.1",
    "jquery": "~3.2.0",
    "slick-carousel": "~1.6.0",
    "lodash": "~4.17.2",
    "motion-ui": "~1.2.2",
    "jquery-bar-rating": "^1.2.2"
}
```

Update the devDependencies section as follows:
```json
"devDependencies": {
    "@spryker/oryx-for-zed": "^2.1.0",
    "autoprefixer": "~8.6.2",
    "clean-webpack-plugin": "~0.1.19",
    "copy-webpack-plugin": "~4.5.1",
    "css-loader": "~0.28.10",
    "fast-glob": "~2.2.2",
    "file-loader": "~1.1.11",
    "mini-css-extract-plugin": "~0.4.0",
    "node-sass": "~4.9.0",
    "optimize-css-assets-webpack-plugin": "~4.0.2",
    "postcss-loader": "~2.1.5",
    "sass-loader": "~7.0.3",
    "sass-resources-loader": "~1.3.3",
    "ts-loader": "~4.4.1",
    "typescript": "~2.9.1",
    "uglifyjs-webpack-plugin": "~1.2.4",
    "webpack": "~4.12.0",
    "webpack-merge": "~4.1.3"
}
```

4. `./src/Pyz/Yves/Application/Theme/default/layout/layout.twig`

Add `<script src="/assets/default/js/runtime.js"></script>` in <head>:
```html
<!-- add here -->
<link rel="stylesheet" href="/assets/default/css/vendor.css" />
<link rel="stylesheet" href="/assets/default/css/app.css" />
```

Add `<script src="/assets/default/js/es6-polyfill.js"></script>` at the very bottom of your page, before app and vendor js:

```html
<!-- add here -->
<script src="/assets/default/js/vendor.js"></script>
<script src="/assets/default/js/app.js"></script>
```

5. Delete `./assets/Yves/default/build/` folder

6. Copy the content of `integration.zip` into your project according to the folder structure defined into the zip file.
