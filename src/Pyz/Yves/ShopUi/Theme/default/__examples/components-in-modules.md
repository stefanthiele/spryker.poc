# COMPONENTS IN MODULES

Sprker Shop is a modular system composed by ~70 different modules, each one is an entire/a part of a specific feature.
This allows the shop to be configured with just the fatures needed by each and every customer.
In order to provide a UI capable of handling modularity, we decided to use component approach.

ShopUi is the main module as it contains shared and general code like global styles, javascript main application bootstrap and twig models. It contains all the "general porpouse" components as well, and by this I mean all the components that are not related to a specific feature but rather are UI agnostic functional units that can be used from every other module.
Without ShopUi there cannot be any modular frontend.

There are other several modules that define components, template and views though.
`CartPage` or `ProductImageWidget` are an example of it.
The former provide the cart page and defines views, template and components dedicated only to cart page functionality.
Every component defined there can only be used in that module as its design is really specific for that feature.
Same goes for the latter, as it defines a view for a widget related to Product feature.
Names, conventions and folder struture applied in ShopUi are valid and applied in each and every module that implements a UI.

ShopUi module provides basics and components that can be used by every other module.
Every other module defines specific, feature-related comopoents that can only be used within the module in wich they're created.
There are exceptions to the rule above, though. It might happen when 2 modules (not ShopUi) are dependent one to the other; in this specific case it's allowed to use components across these modules as the dependency between them is explicitly declared in their `composer.json`. As a general best practice, though, this kind of behaviour is not recommended unless really needed.

Regardless of the parent module, the standardise folder structure enures webpack the ability to crawl into the whole `spryker-shop` repo and load every component. Same goeas for the twig part, managed by PHP.
