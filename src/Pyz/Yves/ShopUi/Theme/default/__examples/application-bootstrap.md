# APPLICATION BOOTSTRAP

this document will guide you through a new application bootstrap
answering the question:
how can I customise this project with my own files?

Let's focus on how the application works

install the dependencies in the project
`npm run install`

build the project
`npm run yves` or `npm run yves:watch` or `npm run yves:production`

At this point: what happens?
When you run the builder (webpack), it will look for entrypoints
entrypoints are the fils that webpack uses to create its output assets

you have 3 entrypoints, and they will be loaded in the DOM in the following order:

- es6-polyfill: it contains
     - `src/Pyz/Yves/ShopUi/Theme/default/es-polyfill.ts`: this file conatins the ES6 polyfills
     for older brosers

- vendor: it contains
     - `src/Pyz/Yves/ShopUi/Theme/default/vendor.ts`: this file contains all the (external) dependecies
     required in this project

- app: it contains
     - `src/Pyz/Yves/ShopUi/Theme/default/app.ts`: this file contains the init logic for the project,
     the bootstrap code for spryker application
     - `src/Pyz/Yves/ShopUi/Theme/default/styles/basic.scss`: this file conatins the basic
     scss styles
     - components: after the basics, every component typescript and style is loaded
     this way, component styles are cascading after the basics and it means that they are stronger
     thus capable of overrideing the basics styles
     - `src/Pyz/Yves/ShopUi/Theme/default/styles/util.scss`: this file contains the util styles
     for the project. It is loaded at the very end as the styles it contains should
     be the strongest in the cascading order: they mus be able to override even
     single component styles
     (ie. by imposing .is-hidden to a component, or by making a button .float-right)

In all of this, you might be wandering:
WHERE CAN I CREATE MY SHARED GLOBAL SASS VARIABLES/FUNCTIONS/MIXINS?

`src/Pyz/Yves/ShopUi/Theme/default/style/shared.scss` is automatically loaded by webpack
as a shared resource before any other style. This allow its content to be
available for every other scss file in the project.

Similar thing happens for every CORE (and only core) component style:
every mixin used to define a coponent style is shared across the project and accessible
from anywhere
