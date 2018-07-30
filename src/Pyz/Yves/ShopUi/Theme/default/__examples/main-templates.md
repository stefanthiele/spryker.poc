# MAIN TEMPLATES

Templates are twig files containing a structure, a backbone for a page or a widget.
A template defines how component are visually organised and arranged in terms of spacing and positions.

The main templates in ShopUi are:

- `page-blank`: it defines a blanck white page. it does not contain any html into the `<body>` tag. It's an empty page.
This template defines instead all basic the assets required from make Atomic Frontend to work. It defines the `<head>` content (meta info, styles, high priority scripts and page title) and the bottom part of the `<body>` (vendor and application scripts).

- `page-layout-main`: extends the `page-blank` template and defines the main layout for every single page in Spryker Suite (header, footer, sidebars, etc.), leaving the content empty and to-be-defines by single views.

In order to change/replace the main layout for the whole Suite, override `page-layout-main` as shown in the related example (`./src/Pyz/ShopUi/Theme/default/templates/page-layout-main/page-layout-main.twig`).
