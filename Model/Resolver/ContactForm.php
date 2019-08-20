<?php
/**
 * Ecomteck
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the ecomteck.com license that is
 * available through the world-wide-web at this URL:
 * https://ecomteck.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Ecomteck
 * @package     Ecomteck_AdvancedContactGraphQl
 * @copyright   Copyright (c) 2019 Ecomteck (https://ecomteck.com/)
 * @license     https://ecomteck.com/LICENSE.txt
 */

namespace Ecomteck\AdvancedContactGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class ContactForm
 * @package Ecomteck\AdvancedContactGraphQl\Model\Resolver
 */
class ContactForm implements ResolverInterface
{
    /**
     * @var \Ecomteck\AdvancedContactGraphQl\Model\Resolver\DataProvider\ContactForm
     */
    private $contactForm;

    /**
     * ContactForm constructor.
     * @param \Ecomteck\AdvancedContactGraphQl\Model\Resolver\DataProvider\ContactForm $contactForm
     */
    public function __construct(
        \Ecomteck\AdvancedContactGraphQl\Model\Resolver\DataProvider\ContactForm $contactForm
    ) {
        $this->contactForm = $contactForm;
    }

    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $fields = $this->contactForm->getForm();

        return [
            'total_field_count' => count($fields),
            'fields' => $fields
        ];
    }
}
