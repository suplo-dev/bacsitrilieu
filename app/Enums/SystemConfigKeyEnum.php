<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SystemConfigKeyEnum extends Enum
{
   const CATEGORY_HEADER = 'category_header';
   const CATEGORY_BODY_1 = 'category_body_1';
   const CATEGORY_BODY_2 = 'category_body_2';
   const CATEGORY_FOOTER = 'category_footer';

   public static function getHomeCategory(): array
   {
       return [self::CATEGORY_HEADER, self::CATEGORY_BODY_1, self::CATEGORY_BODY_2, self::CATEGORY_FOOTER];
   }
}
