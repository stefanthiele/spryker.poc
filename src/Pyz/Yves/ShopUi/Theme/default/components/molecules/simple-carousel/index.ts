// before this file, please take a look at ShopUi/Theme/default/components/organisms/new-component-counter

//  this example explains how to override an existing component

// import the styles
import './simple-carousel.scss';

// import the registration from app
import register from 'ShopUi/app/registry';

// export the component and register it on the original tag (simple-carousel)
// this way the original code will not be executed and will be substituted by your new code
export default register('simple-carousel', () => import(/* webpackMode: "lazy" */'./simple-carousel'));
