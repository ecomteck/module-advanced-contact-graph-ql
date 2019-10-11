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
use Ecomteck\AdvancedContactGraphQl\Model\Request\CreateRequest;

/**
 * Class SendContact
 * @package Ecomteck\AdvancedContactGraphQl\Model\Resolver
 */
class SendContact implements ResolverInterface
{
    /**
     * @var CreateRequest
     */
    private $createRequest;

    /**
     * SendContact constructor.
     * @param CreateRequest $createRequest
     */
    public function __construct(CreateRequest $createRequest)
    {
        $this->createRequest = $createRequest;
    }

    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return \Magento\Framework\GraphQl\Query\Resolver\Value|\Magento\Framework\Phrase|mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $data = $args['input'];
        $request = $this->createRequest->execute($data);
        if ($request->getId() > 0) {
            return __('Your contact has been sent to the shop owner.');
        } else {
            return __('Please check your information again.');
        }
    }
}
