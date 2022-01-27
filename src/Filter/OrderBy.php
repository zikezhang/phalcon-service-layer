<?php
/**
 * This source file is subject to the MIT License.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this package.
 */
declare(strict_types=1);

namespace Headio\Phalcon\ServiceLayer\Filter;

use function is_null;
use function strcasecmp;

class OrderBy implements OrderByInterface
{
    private string $column;

    private ?string $direction;

    public function __construct(string $column, ?string $direction = null)
    {
        $this->column = $column;
        $this->direction = $direction;

        if (!is_null($this->direction)) {
            if (0 === strcasecmp($this->direction, OrderBy::ASC)) {
                $this->direction = null;
            } else {
                $this->direction = OrderBy::DESC;
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * {@inheritDoc}
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * {@inheritDoc}
     */
    public function hasDirection(): bool
    {
        return !empty($this->direction);
    }
}
