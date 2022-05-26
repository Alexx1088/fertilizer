<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const NITROGEN_RATE_FROM = 'nitrogen_rate_from';
    public const NITROGEN_RATE_TO = 'nitrogen_rate_to';
    public const PHOSPHORUS_RATE_FROM = 'phosphorus_rate_from';
    public const PHOSPHORUS_RATE_TO = 'phosphorus_rate_to';
    public const POTASSIUM_RATE_FROM = 'potassium_rate_from';
    public const POTASSIUM_RATE_TO = 'potassium_rate_to';
    public const CULTURE_GROUP_ID = 'culture_group_id';
    public const DISTRICT = 'district';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';
    public const DESCRIPTION = 'description';
    public const DESTINATION = 'destination';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.

        return [
            self::NAME => [$this, 'name'],
            self::NITROGEN_RATE_FROM => [$this, 'nitrogen_rate_from'],
            self::NITROGEN_RATE_TO => [$this, 'nitrogen_rate_to'],
            self::PHOSPHORUS_RATE_FROM => [$this, 'phosphorus_rate_from'],
            self::PHOSPHORUS_RATE_TO => [$this, 'phosphorus_rate_to'],
            self::POTASSIUM_RATE_FROM => [$this, 'potassium_rate_from'],
            self::POTASSIUM_RATE_TO => [$this, 'potassium_rate_to'],
            self::CULTURE_GROUP_ID => [$this, 'culture_group_id'],
            self::DISTRICT => [$this, 'district'],
            self::PRICE_FROM => [$this, 'price_from'],
            self::PRICE_TO => [$this, 'price_to'],
            self::DESCRIPTION => [$this, 'description'],
            self::DESTINATION => [$this, 'destination'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }


    public function nitrogen_rate_from(Builder $builder, $nitrogen_rate_from)
    {
        $builder->where('nitrogen_rate', '>', $nitrogen_rate_from);
    }

    public function nitrogen_rate_to(Builder $builder, $nitrogen_rate_to)
    {
        $builder->where('nitrogen_rate', '<', $nitrogen_rate_to);
    }

      public function phosphorus_rate_from(Builder $builder, $phosphorus_rate_from)
      {

          $builder->where('phosphorus_rate', '>', $phosphorus_rate_from);

      }
    public function phosphorus_rate_to(Builder $builder, $phosphorus_rate_to)
    {

        $builder->where('phosphorus_rate', '<', $phosphorus_rate_to);

    }

      public function potassium_rate_from(Builder $builder, $potassium_rate_from)
      {

          $builder->where('potassium_rate', '>', $potassium_rate_from);

      }
    public function potassium_rate_to(Builder $builder, $potassium_rate_to)
    {

        $builder->where('potassium_rate', '<', $potassium_rate_to);

    }
      public function culture_group_id(Builder $builder, $value)
      {

          $builder->where('culture_group_id', 'like', "%{$value}%");

      }

      public function district(Builder $builder, $value)
      {

          $builder->where('district', 'like', "%{$value}%");

      }

      public function price_from(Builder $builder, $price_from)
      {

          $builder->where('price', '>', $price_from);

      }
    public function price_to(Builder $builder, $price_to)
    {

        $builder->where('price', '<', $price_to);

    }
      public function description(Builder $builder, $value)
      {

          $builder->where('description', 'like', "%{$value}%");

      }

      public function destination(Builder $builder, $value)
      {

          $builder->where('destination', 'like', "%{$value}%");

      }
}