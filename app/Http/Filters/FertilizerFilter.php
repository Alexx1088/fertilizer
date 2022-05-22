<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const NITROGEN_RATE = 'nitrogen_rate';
    public const PHOSPHORUS_RATE = 'phosphorus_rate';
    public const POTASSIUM_RATE = 'potassium_rate';
    public const CULTURE_GROUP_ID = 'culture_group_id';
    public const DISTRICT = 'district';
    public const PRICE = 'price';
    public const DESCRIPTION = 'description';
    public const DESTINATION = 'destination';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.

        return [
            self::NAME => [$this, 'name'],
            self::NITROGEN_RATE => [$this, 'nitrogen_rate'],
            self::PHOSPHORUS_RATE => [$this, 'phosphorus_rate'],
            self::POTASSIUM_RATE => [$this, 'potassium_rate'],
            self::CULTURE_GROUP_ID => [$this, 'culture_group_id'],
            self::DISTRICT => [$this, 'district'],
            self::DESCRIPTION => [$this, 'description'],
            self::DESTINATION => [$this, 'destination'],
        ];

    }

    public function name(Builder $builder, $value) {

        $builder->where('name', 'like', "%{$value}%");

    }

    public function nitrogen_rate(Builder $builder, $value) {

        $builder->where('nitrogen_rate', 'like', "%{$value}%");

    }

    public function phosphorus_rate(Builder $builder, $value) {

        $builder->where('phosphorus_rate', 'like', "%{$value}%");

    }
    public function potassium_rate(Builder $builder, $value) {

        $builder->where('potassium_rate', 'like', "%{$value}%");

    }
    public function culture_group_id(Builder $builder, $value) {

        $builder->where('culture_group_id', 'like', "%{$value}%");

    }
    public function district(Builder $builder, $value) {

        $builder->where('district', 'like', "%{$value}%");

    }
    public function price(Builder $builder, $value) {

        $builder->where('price', 'like', "%{$value}%");

    }
    public function description(Builder $builder, $value) {

        $builder->where('description', 'like', "%{$value}%");

    }
    public function destination(Builder $builder, $value) {

        $builder->where('destination', 'like', "%{$value}%");

    }
}