# NAMING CONVETIONS

### Files and folders

Atomic frontend can be found in every module that supports it, in the folling folders:

- spryker-shop (root `./vendor/spryker-shop`): `module-name/src/SprykerShop/Yves/ModuleName/Theme/default`
- project (root `./`): `src/Pyz/Yves/ModuleName/Theme/default`

The folder structure for the components is the following, both for `spryker-shop` and project:

- atoms:
    `components/atoms/component-name/`
    |-- `component-name.twig`
    |-- `component-name.scss`
    |-- `component-name.ts`
    |-- `index.ts`
    |-- `style.scss`

- molecules:
    `components/molecules/component-name/`
    |-- `component-name.twig`
    |-- `component-name.scss`
    |-- `component-name.ts`
    |-- `index.ts`
    |-- `style.scss`

- organisms:
    `components/organisms/component-name/`
    |-- `component-name.twig`
    |-- `component-name.scss`
    |-- `component-name.ts`
    |-- `index.ts`
    |-- `style.scss`

- templates:
    `templates/template-name/`
    |-- `template-name.twig`

- views:
    `views/view-name/`
    |-- `view-name.twig`

Let's explain some rules:

- frontend uses *kebab-case* as naming convention for every file/folder name within the `default` folder
- every component/template/view is always contained in a folder with the same name
- atoms/molecules/organisms are always contained in a folder called `components`
- templates are always contained in a folder called `templates`
- views are always contained in a folder called `views`

### Variables and functions

Naming conventions for variables/functions dependes on the technology:

- twig: everything related to atomic frontend follows *camelCase*
- sass: it follows *kebab-case*
- typescript: it follows *camelCase*
