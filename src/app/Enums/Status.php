<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum
{
    const Off = 0;
    const Going = 1;
    const Bleak = 2;
    const Out = 3; 

    public static function getDescription($value): string
    {
        switch ($value){
            case self::Off:
                return '勤務外';
                brake;
            case self::Going:
                return '出勤中';
                brake;
            case self::Bleak:
                return '休憩中';
                brake;
            case self::Out:
                return '退勤済';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
