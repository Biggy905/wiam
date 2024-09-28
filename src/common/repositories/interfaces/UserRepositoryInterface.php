<?php

namespace common\repositories\interfaces;

interface UserRepositoryInterface
{
    public function findAllWithOrderIsApproved(): array;
    public function existsByIdAndIsApproved(int $id): bool;
}
