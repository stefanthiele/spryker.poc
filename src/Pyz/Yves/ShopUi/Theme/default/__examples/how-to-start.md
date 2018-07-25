# HOW TO START

You can start a project from different points:
- twig
- style
- javascript/typescript

### Twig

If you start with twig, probably, you already know how it works.
Twig support the overriding of files on project level, so everytime you create a module folder in `./src/Pyz/Yves` with the same folder structure as in `spryker-shop` and you place there a twig file with the exact filename as the one in `spryker-shop`, you override the core one. the examples are in the related folder.

### Style

Another important thing to override is style.
Go to `./src/Pyz/Yves/ShopUi/Theme/default/styles` and you'll find 3 files:

`shared.scss`
This is the place for global and shared variables/functions/mixins.
Use this file to override the existing variables (you can find them in `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/shared.scss`).
If you look into `spryker-shop`, you'll notice that the `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/shared.scss` file imports styles from `settings` and `helpers` folders:

- `settings` is a folder that contains only variables, organized by topic. Override them in `./src/Pyz/Yves/ShopUi/Theme/default/styles/shared.scss` and the changes will be automatically applied to the whole UI.
- `helpers` contains all the global functions and mixins that we use in our system. You can override or extend them in `./src/Pyz/Yves/ShopUi/Theme/default/styles/shared.scss`.

As you can see, `settings` and `helpers` contain only code that DOES NOT produce any output unless *used* (variables) or *called* (functions and mixins). This is very important as **it's a shared environment and no rendering must happen here**. If you add actual styles here, they will be rendered for every component you use in the sistem.

`basic.scss`
This is the place for global styles, like reset or typography.
You can find the full implentation here `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/basic.scss` and in the `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/basics` folder.
Use this files to add global styles that are gonna be applyed **before** components.
This ensure that the component styles will be stronger (due to the cascading rule of css).

`util.scss`
This is the place for global util styles, like float or text align.
You can find the full implentation here `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/util.scss` and in the `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/styles/utils` folder.
Use this files to add global util styles that are gonna be applyed **after** components.
This ensure that the util styles will be stronger (due to the cascading rule of css).

### Javascript/Typescript

First of all: **typescript is recommended but not mandatory**.
You can always disable it and switch to ES6-ES7 javascript by adding `allowJs: true` to your `./tsconfig.json` file:

```json
{
    "compilerOptions": {
        "allowJs": true,
        ...
    }
}
```

Webpack will build `spryker-shop` using typescript, but you can now develop in pure javascript for your project.

If you go to `./src/Pyz/Yves/ShopUi/Theme/default` you'll find 3 files:
- es6-polyfill.ts
- vendor.ts
- app.ts

These are entry point for webpack: it means that the code execution for your application starts here.

`es6-polyfill.ts`
This file contains the polyfill required to make ES6 features (ie. promises, sets, maps, arrays, etc.) available in older broswers like IE11. Feel free to add as many polyfills as you want here, according to your needs.

`vendor.ts`
This file contains the external deps for the system. We do provide only one dependency (webcomponents).
Add you own dependencies here (ie. jquery, recat, vue, etc.).
By doung so, webpack will optimise the output including each dependency code only once (in this file) and will provide references to every other file (`app.ts` or components) that require them.

`app.ts`
This file contains the bootstrap code.
Add/change the logic inside to start the execution of your application (ie. document.ready for jquery, main conatiner/fragment rendering for react, etc.).
Spryker application bootstrap simply loads the components.
If you need more insights about `shop-ui` application, go to `./vendor/spryker-shop/shop-ui/src/SprykerShop/Yves/ShopUi/Theme/default/app` folder to have a thorough overview over the main typescript logic to load components.
