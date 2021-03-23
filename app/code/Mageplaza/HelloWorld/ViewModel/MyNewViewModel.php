<?php
namespace Mageplaza\HelloWorld\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Webapi\Rest\Request\Deserializer\Json;
use Magento\Customer\Block\Account\Customer;

class MyNewViewModel implements ArgumentInterface
{

    private $customer;
    private $serializer;

    /**
     * MyNewViewModel constructor.
     * @param Customer $customer
     * @param Json $serializer
     */
    public function __construct(
        Customer $customer,
        Json $serializer
    ) {
        $this->customer = $customer;
        $this->serializer = $serializer;
    }

    /**
     * Generates title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return 'Hello from VIEW MODEL';
    }

    /**
     * @return bool
     */
    public function customerLoggedIn(): bool
    {
        return $this->customer->customerLoggedIn();
    }

    /**
     * @param $json
     * @return array|null
     * @throws \Magento\Framework\Webapi\Exception
     */
    public function deserialize($json): ?array
    {
        return $this->serializer->deserialize($json);
    }
}
