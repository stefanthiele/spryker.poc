import * as React from 'react';
import * as ReactDOM from 'react-dom';

export interface Props {
    name: string
    url: string
    compiler: string
    framework: string
}

export const ColorSelector = (props: Props) =>
    <a
        className={`${props.name}__color js-${props.name}__color`}>
    </a>;

const elements: Element[] = Array.from(document.getElementsByTagName('color-selector'));

elements.forEach((element: Element) => {
    ReactDOM.render(
        <ColorSelector name="color-selector" url={element.getAttribute('')} compiler="TypeScript" framework="React" />,
        element
    );
});
