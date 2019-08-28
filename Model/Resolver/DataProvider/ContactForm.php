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

namespace Ecomteck\AdvancedContactGraphQl\Model\Resolver\DataProvider;

use Ecomteck\AdvancedContact\Api\RequestRepositoryInterface;

/**
 * Class ContactForm
 * @package Ecomteck\AdvancedContactGraphQl\Model\Resolver\DataProvider
 */
class ContactForm
{
    /**
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * ContactForm constructor.
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(RequestRepositoryInterface $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    /**
     * @return string
     */
    public function getForm()
    {
        return $this->requestRepository->getListFields();
    }
}
