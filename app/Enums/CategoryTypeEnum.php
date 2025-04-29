<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class CategoryTypeEnum extends Enum
{
    const DEFAULT = 0;
    const HEADER = 1;
    const BODY_1 = 2;
    const BODY_2 = 3;
    const FOOTER = 4;
}
