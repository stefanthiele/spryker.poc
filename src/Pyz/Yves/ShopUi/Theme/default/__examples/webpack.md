# WEBPACK

This project is webpack-based.
It means that webpack is used to comile the typescript and sass into javascript and
css, and to copy all the remaining assets (images, fints, etc.) into the public folder.

You can find the complete webpack implementation and configuration in:
`./frontend` folder.

- `./frontend/settings.js`: defines the main settings for the project; you can change and/or
customise them at your needs

- `./frontend/build.js`: it's the task loader, and it is called by npm when performing
`npm run yves`. It just execute webpack.

- `./frontend/libs/alias.js`: it takes the `paths` propertu defined into the
`./tsconfig.json` file and transform them into webpack aliases. This way, you
can be sure that an alias defined into typescript will be available for every
file in typescript and in sass as well.

- `./frontend/libs/compiler.js`: it's a simple function that calls webpack as compiler
and print a nice output for every build cycle.

- `./frontend/libs/finder.js`: its a set of functions used to perform **glob** operations on
the filesystem. As long as spryker-shop is a *modular* application, webpack need to know
which modules are availabe and which one contains a frontend implementation. To do so,
we use a glob function capable of looking into the filesystem and dicovering the
target assets to compile.

- `./frontend/configs/development.js`: webpack development configuration
- `./frontend/configs/development-watch.js`: webpack development configuration with watchers
- `./frontend/configs/development.js`: webpack production configuration

- `./frontend/assets` folder: it contains the static assets (images and fonts) that might be needed in the project. Put your static files in here and they will be automatically copied into the public folder.
