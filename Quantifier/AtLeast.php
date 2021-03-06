<?php

/**
 * This file is part of the Cubiche package.
 *
 * Copyright (c) Cubiche
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Cubiche\Core\Specification\Quantifier;

use Cubiche\Core\Selector\SelectorInterface;
use Cubiche\Core\Specification\SpecificationInterface;

/**
 * At Least Quantifier Class.
 *
 * @author Karel Osorio Ramírez <osorioramirez@gmail.com>
 */
class AtLeast extends Quantifier
{
    /**
     * @var int
     */
    protected $count;

    /**
     * @param int                    $count
     * @param SelectorInterface      $selector
     * @param SpecificationInterface $specification
     */
    public function __construct($count, SelectorInterface $selector, SpecificationInterface $specification)
    {
        parent::__construct($selector, $specification);

        $this->count = (int) $count;
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * {@inheritdoc}
     */
    public function evaluate($value)
    {
        if ($this->count() == 0) {
            return true;
        }

        $count = 0;
        /** @var bool $result */
        foreach ($this->evaluationIterator($value) as $result) {
            if ($result) {
                ++$count;
                if ($this->count() == $count) {
                    return true;
                }
            }
        }

        return false;
    }
}
