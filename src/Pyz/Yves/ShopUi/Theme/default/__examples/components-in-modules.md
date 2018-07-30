# COMPONENTS IN MODULES

Sprker Shop is a modular system composed by ~70 different modules, each one is an entire/a part of a specific feature.
This allows the shop to be configured with just the fatures needed by each and every customer.
In order to provide a UI capable of handling modularity, we decided to use component approach.

ShopUi is the main module as it contains shared and general code like global styles, javascript main application bootstrap and twig models. It contains all the "general porpouse" components as well, and by this I mean all the components that are not related to a specific feature but rather defines a UI agnostic functional unit that can be used from every other module.
Without ShopUi there cannot be any modular frontend.

But there are other several modules that define components, template and views.
`CartPage` or `ProductImageWidget` are an example of it.
The former provide the cart page and defines views, template and components dedicated only to cart page functionality.
Every component defined there can only be used in that module as its design is really specific for that feature.
Same goes for the latter, as it defines a view for a widget related to Product feature.

Names, conventions and folder struture applied in ShopUi are valid and applied in each and every module that implements a UI.
