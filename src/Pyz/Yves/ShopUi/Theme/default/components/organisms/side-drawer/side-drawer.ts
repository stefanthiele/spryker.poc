import SideDrawer from 'ShopUi/components/organisms/side-drawer/side-drawer';

export default class NewSideDrawer extends SideDrawer {

    protected readyCallback(): void {
        super.readyCallback();

        alert('side');
    }

}
