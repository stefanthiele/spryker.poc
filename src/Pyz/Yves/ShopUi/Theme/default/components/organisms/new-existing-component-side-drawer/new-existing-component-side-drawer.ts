// import the SideDrawer class intead of the Component base one
// you can then use it and extend it
import SideDrawer from 'ShopUi/components/organisms/side-drawer/side-drawer';

// export the extended class
export default class NewSideDrawer extends SideDrawer {
    protected readyCallback(): void {
        super.readyCallback();

        alert('new side drawer');
    }
}
