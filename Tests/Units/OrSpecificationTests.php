<?php
/**
 * This file is part of the Cubiche package.
 *
 * Copyright (c) Cubiche
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cubiche\Core\Specification\Tests\Units;

use Cubiche\Core\Specification\Criteria;

/**
 * Or Specification Tests Class.
 *
 * @author Ivannis Suárez Jerez <ivannis.suarez@gmail.com>
 * @author Karel Osorio Ramírez <osorioramirez@gmail.com>
 */
class OrSpecificationTests extends SpecificationTestCase
{
    /**
     * {@inheritdoc}
     *
     * @see \Cubiche\Tests\TestCase::defaultConstructorArguments()
     */
    public function defaultConstructorArguments()
    {
        return array(Criteria::lte(25), Criteria::gt(30));
    }

    /**
     * {@inheritdoc}
     *
     * @see \Cubiche\Core\Visitor\Tests\Units\VisiteeInterfaceTestCase::shouldVisitMethod()
     */
    protected function shouldVisitMethod()
    {
        return 'visitOr';
    }

    /**
     * {@inheritdoc}
     *
     * @see \Cubiche\Core\Specification\Tests\Units\SpecificationInterfaceTestCase::evaluateSuccessDataProvider()
     */
    protected function evaluateSuccessDataProvider()
    {
        return array(
            array(20),
            array(25),
            array(31),
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see \Cubiche\Core\Specification\Tests\Units\SpecificationInterfaceTestCase::evaluateFailureDataProvider()
     */
    protected function evaluateFailureDataProvider()
    {
        return array(
            array(26),
            array(30),
        );
    }
}
