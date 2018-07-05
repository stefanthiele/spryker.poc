// before this file, please take a look at ShopUi/Theme/default/components/organisms/new-component-counter

// this is a way to create a NEW component that is based upon an existing one

// as usual, import the styles
import './new-existing-component-side-drawer.scss';

// import the register function for typescript
import register from 'ShopUi/app/registry';

// register the component and associate it with a new tag
// (in thei example, the original component tag is side-drawer)
export default register(
    'new-existing-component-side-drawer',
    () => import(/* webpackMode: "eager" */'./new-existing-component-side-drawer')
);
