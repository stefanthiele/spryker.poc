import * as React from 'react';
import * as ReactDOM from 'react-dom';

export interface HelloProps {
    compiler: string
    framework: string
}

export const Hello = (props: HelloProps) => <strong>Hello from {props.compiler} and {props.framework}!</strong>;

const elements: Element[] = Array.from(document.getElementsByTagName('color-selector'));

elements.forEach((element: Element) => {
    ReactDOM.render(
        <Hello compiler="TypeScript" framework="React" />,
        element
    );
});
