// this is a new component, but the code can be taken as example for an extended one too
// in this file you register the typescript and style for the component
// typescript ans styles are optional anyway; you may have a component without style, or without typescript, or without both

// import the style for this specific component
import './new-component-counter.scss';

// import the main function for registering the compnent into the application
import register from 'ShopUi/app/registry';

// register the component
export default register(
    // this is the tagname associated to the component
    // it's defined in twig and rendered in the dom
    // every time this tag is found in the final html, the application loads this component
    'new-component-counter',

    // this is the function used to load the component
    // it's a webpack import() (https://webpack.js.org/guides/code-splitting/#dynamic-imports)
    // and has one parameter: the relative path to the typescript file
    // the comment /* webpackMode: "lazy" */ is called magic comment and it's part of
    // webpack specification for this functionality (see docs above)
    () => import(/* webpackMode: "lazy" */'./new-component-counter')
);
