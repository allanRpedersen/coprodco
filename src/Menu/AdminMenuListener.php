<?php

namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('Coprod.Co')
        ;

        $newSubmenu
            ->addChild('suppliers',[
                'route' => 'app_admin_supplier_index',
            ])
            ->setLabel('Suppliers')
        ; 
   }

//    $menu = $event->getMenu();
//    $order = $event->getOrder();

//    if (null !== $order->getId()) {
//        $menu
//            ->addChild('ship', [
//                'route' => 'sylius_admin_order_shipment_ship',
//                'routeParameters' => ['id' => $order->getId()]
//            ])
//            ->setAttribute('type', 'transition')
//            ->setLabel('Ship')
//            ->setLabelAttribute('icon', 'checkmark')
//            ->setLabelAttribute('color', 'green')
//        ;
//    }


}