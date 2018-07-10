// this file is a webpack entrypoint
// this file represent the entrypoint for ecmascript polyfills only
// you can add more polyfills using the ones provided by core-js
// as long as our sistem uses some es6/7 features (promises, maps, etc...)
// this file is important as it guarantees that these features are available on every brower
// back to IE11

// custom-elements-es5-adapter is, instead, a polyfill for webcomponents
// allowing es6 classes on es5

// add es6 polyfill
import 'core-js/fn/promise';
import 'core-js/fn/array';
import 'core-js/fn/set';
import 'core-js/fn/map';

// check if the browser natively supports webcomponents (and es6)
const hasNativeCustomElements = !!window.customElements;

// then load a shim for es5 transpilers (typescript or babel)
// https://github.com/webcomponents/webcomponentsjs#custom-elements-es5-adapterjs
if (hasNativeCustomElements) {
    import(/* webpackMode: "eager" */'@webcomponents/webcomponentsjs/custom-elements-es5-adapter');
}
