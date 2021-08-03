<?php

namespace My\Nosto\Observer\Product;

use Magento\Customer\Model\Session;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Load implements ObserverInterface
{

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Constructor for Load
     *
     * @param Session $session
     */
    public function __construct(
        Session $session
    ) {
        $this->customerSession = $session;
    }

    /**
     * Observer for "nosto_product_load_after" event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        /* @var $product \Nosto\Model\Product\Product */
        $product = $observer->getProduct();

        if ($this->customerSession->isLoggedIn()) {
            $product->setPrice($product->getPrice() * 0.9);
            $product->setListPrice($product->getListPrice() * 0.9);
        }
    }
}
