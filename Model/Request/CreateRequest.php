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

namespace Ecomteck\AdvancedContactGraphQl\Model\Request;

use Ecomteck\AdvancedContact\Api\Data\RequestInterface;
use Ecomteck\AdvancedContact\Api\Data\RequestInterfaceFactory;
use Ecomteck\AdvancedContact\Api\RequestRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;

/**
 * Class CreateRequest
 * @package Ecomteck\AdvancedContactGraphQl\Model\Request
 */
class CreateRequest
{
    /**
     * @var DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * @var RequestInterfaceFactory
     */
    private $requestFactory;

    /**
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * CreateRequest constructor.
     * @param DataObjectHelper $dataObjectHelper
     * @param RequestInterfaceFactory $requestFactory
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(
        DataObjectHelper $dataObjectHelper,
        RequestInterfaceFactory $requestFactory,
        RequestRepositoryInterface $requestRepository
    ) {
        $this->dataObjectHelper  = $dataObjectHelper;
        $this->requestFactory    = $requestFactory;
        $this->requestRepository = $requestRepository;
    }

    /**
     * @param array $args
     * @return RequestInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute(array $args):RequestInterface
    {
        $requestDataObject = $this->requestFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $requestDataObject,
            $args,
            RequestInterface::class
        );

        return $request = $this->requestRepository->save($requestDataObject);
    }
}
