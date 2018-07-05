// this is the file containing the behavioural part for the component
// this file return a Component, defined in the main ShopUi module

// import the Component base class from ShopUi module
// this class extends HTMLElement and add some custom propery and method
// see vendor/spryker-shop/shop-ui/.../models/component.ts for more details
import Component from 'ShopUi/models/component';

// export (default) your custom component extending Component base class
export default class NewComponentCounter extends Component {
    protected counter: HTMLElement
    protected elements: HTMLElement[]

    // the ready callback is needed to start the execution for the component
    // is called once the whole dom is ready and every other component has been loaded
    // this is safe for DOM manipolation
    // you can use every other callback defined by webcomponent standard (https://developer.mozilla.org/en-US/docs/Web/Web_Components)
    protected readyCallback(): void {
        this.counter = <HTMLElement>document.querySelector(`.${this.jsName}__counter`);
        this.elements = <HTMLElement[]>Array.from(document.querySelectorAll(this.elementSelector));
        this.count();
    }

    count(): void {
        this.counter.innerText = `${this.elements.length}`;
    }

    get elementSelector(): string {
        return this.getAttribute('element-selector');
    }
}

// this class is a pure webcomponent
// it means that by using `this` keyword, you're actually accessing the public API of the html element
// this component is associated with (see index.ts)
