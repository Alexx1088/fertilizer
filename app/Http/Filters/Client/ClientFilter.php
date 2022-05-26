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

   public function agreement_date(Builder $builder, $dateFrom=2010, $dateTo=2020)
    {
        return $builder->whereBetween('agreement_date', [$dateFrom, $dateTo]);
    }

    public function delivery_cost(Builder $builder, $priceFrom=0, $priceTo=500)
    {
        return $builder->whereBetween('delivery_cost', [$priceFrom, $priceTo]);
    }

    public function region(Builder $builder, $arr=['Омск','Прага', 'Курск'] )
    {
        $builder->whereIn('region', ['Омск','Прага', 'Курск']);
    }
}