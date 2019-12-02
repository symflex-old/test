<?php
declare(strict_types=1);

namespace App\Model;

/**
 * Interface Master
 * @package App\Model
 */
interface Master
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isVip(): bool;
}
