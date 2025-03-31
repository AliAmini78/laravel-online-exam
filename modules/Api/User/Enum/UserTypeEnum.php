<?php

namespace Api\User\Enum;

enum UserTypeEnum : string
{
    case ADMIN = "admin";
    case STAFF = "staff";
    case TEACHER = "teacher";
    case STUDENT = "student";


    public  function title(): string
    {
        return match ($this){
            self::ADMIN => "ادمین" ,
            self::STAFF => "کارمند" ,
            self::TEACHER  => "استاد" ,
            self::STUDENT  => "دانشجو" ,
        };
    }


    /**
     * @return array
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $item){
            $array[] = $item->value;
        }
        return $array;
    }

    /**
     * @return array
     */
    public static function toArrayFa(): array
    {
        $array = [];
        foreach (self::cases() as $item){
            $array[] = $item->title();
        }
        return $array;
    }
}
