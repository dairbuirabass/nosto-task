<?php

namespace My\Nosto\Observer\Product;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Load implements ObserverInterface
{
    public function __construct()
    {
    }

    /**
     * Observer for "nosto_product_load_after" event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        /* @var $product \NostoProduct */
        $product = $observer->getProduct();

        /*
        * Here you can modify any product property you need and it will
        * automatically be used both in the store front tagging and the
        * server-to-server API calls.
        *
        * Note that any new properties will not automatically be used.
        *
        * @see https://support.nosto.com/get-started/tagging-product-pages/
        */

        /*
         * Example 1
         *
         * Adding "tag2" and "tag3" properties.
         *
         * These properties are used to include more information about the
         * product that can in turn be used for more granular control in the
         * product recommendations.
         *
         * It is important to notice that the `addTag()` function receives a string as an argument
         * and can be called multiple times in order to add multiple arguments.
         *  If you call:
         *  $product->addTag3('example1');
         *  $product->addTag3('example2');
         *  You will have `example1` and `example2` as in the tag3 field.
         *
         * The `setTag` function takes an array of strings as argument and
         * will override any previously assigned values to the tag:
         *
         * $product->setTag2(['example1', 'example2']);
         * $product->setTag3(['example3']);
         *
         */

        /*
         * Example 2
         *
         * Changing the product image URL.
         *
         * If you are, for example, using a 3rd party cloud storage for your
         * product images.
         *
         * The url must be absolute and includes the protocol (http or https).
         * $product->setImageUrl('http://example.com/p/example.jpg');
         *
         */

        // This can be removed when implementing this extension, it's here only to
        // check that the override works when implemented.
        $product->addTag3('nosto');
    }
}
