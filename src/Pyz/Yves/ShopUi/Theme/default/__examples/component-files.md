# COMPONENT FILES

This is how a component looks alike:

`components/(atoms|molecule|organisms)/component-name/`
    |-- `component-name.twig`
    |-- `component-name.scss`
    |-- `component-name.ts`
    |-- `index.ts`
    |-- `style.scss`

Let's dive into each file to understand what's for:

- `component-name.twig`: contains the twig implementation, as follows:

```twig
{% extends model('component') %}

{% define config = {
    name: 'component-name',
    tag: 'tag'
} %}

{% define data = {
    ...
} %}

{% block body %}
    ...
{% endblock %}
```

- `component-name.scss`: contains the style for the component, wrapped into a mixin with this structure:

```scss
@mixin module-name-component-name($name: '.component-name') {
    #{$name} {
        // BEM styles

        @content;
    }
}
```

- `component-name.ts`: contains the typescript implementation defined as a custom element, as follows:

```ts
import Component from 'ShopUi/models/component';

export default class ComponentName extends Component {
    protected readyCallback(): void {
        // implementation
    }
}
```

- `index.ts`: it's required to load the client-side of the component with webpack.
The latter globs the system looking for these files and bundles them into an output file.
Create this file whenever you need to include a style and/or a typescript/javascript file as part of the component.

- `style.scss`: imports the style defined in `component-name.scss`.
**This file is required only for core development; projects can ignore it.**
`component-name.scss` defines a style, but it does not include it. This is because a mixin migh be used multiple times or extended; to prevent the content to rendered in the output everytime you call the mixin, `component-name.scss` just defines the style, while `style.scss` import it (producing an output, but just once).

**For more insights about these files, please take a look at `new-component-counter` example, starting from `index.ts`.**
