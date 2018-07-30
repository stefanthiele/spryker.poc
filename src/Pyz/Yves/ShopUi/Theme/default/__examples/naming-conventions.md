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

- twig: everything related to atomic frontend follows *camelCase* (please refer to how-a-component-works for  more details about conventions)
- sass: it follows *kebab-case*, implements BEM methodology with the following syntax:
    - block: `.component-name`
    - element: `.component-name__element`
    - modifier: `.component-name--modifier` or `.component-name__element--modifier`
    - as block modfiers are the only parameter we can use to customise a component when using it (include or embed), sometimes in our code you'll find open violations of BEM as some block modifiers might be in cascade with elements in order to customise them.
- typescript: it follows *camelCase* (please refer to `new-component-counter.ts` molecule for  more details about conventions)
