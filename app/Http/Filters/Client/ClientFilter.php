<?php


namespace App\Http\Filters\Client;


use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends abstractFilter
{
    public const NAME = 'name';
    public const AGREEMENT_DATE = 'agreement_date';
    public const DELIVERY_COST = 'delivery_cost';
    public const REGION = 'region';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.

        return [
            self::NAME => [$this, 'name'],
            self::AGREEMENT_DATE => [$this, 'agreement_date'],
            self::DELIVERY_COST => [$this, 'delivery_cost'],
            self::REGION => [$this, 'region'],
        ];

    }

    public function name(Builder $builder, $value)
    {

        $builder->where('name', 'like', "%{$value}%");

    }

    public function agreement_date(Builder $builder, $value)
    {

        $dateFrom = 2022;
        $builder->where('agreement_date', '>', $dateFrom);
        $dateTo = 2021;
        $builder->where('agreement_date', '<', $dateTo);
    }

   public function delivery_cost(Builder $builder, $value)
    {
        $costFrom =0;
        $builder->where('delivery_cost', '<', $costFrom) ;
    }

  /*  public function potassium_rate(Builder $builder, $value)
    {

        $builder->where('potassium_rate', 'like', "%{$value}%");

    }

    public function culture_group_id(Builder $builder, $value)
    {

        $builder->where('culture_group_id', 'like', "%{$value}%");

    }

    public function district(Builder $builder, $value)
    {

        $builder->where('district', 'like', "%{$value}%");

    }

    public function price(Builder $builder, $value)
    {

        $builder->where('price', 'like', "%{$value}%");

    }

    public function description(Builder $builder, $value)
    {

        $builder->where('description', 'like', "%{$value}%");

    }

    public function destination(Builder $builder, $value)
    {

        $builder->where('destination', 'like', "%{$value}%");

    }*/
}