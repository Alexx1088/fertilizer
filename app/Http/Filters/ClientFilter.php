<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends abstractFilter
{
    public const NAME = 'name';
    public const AGREEMENT_DATE_FROM = 'agreement_date_from';
    public const AGREEMENT_DATE_TO = 'agreement_date_to';
    public const DELIVERY_COST_FROM = 'delivery_cost_from';
    public const DELIVERY_COST_TO = 'delivery_cost_to';
    public const REGION = 'region';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.

        return [
            self::NAME => [$this, 'name'],
            self::AGREEMENT_DATE_FROM => [$this, 'agreement_date_from'],
            self::AGREEMENT_DATE_TO => [$this, 'agreement_date_to'],
            self::DELIVERY_COST_FROM => [$this, 'delivery_cost_from'],
            self::DELIVERY_COST_TO => [$this, 'delivery_cost_to'],
            self::REGION => [$this, 'region'],
        ];

    }

   public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

   public function agreement_date_from(Builder $builder, $agreement_date_from)
    {
        return $builder->where('agreement_date',$agreement_date_from);
    }
    public function agreement_date_to(Builder $builder, $agreement_date_to)
    {
        return $builder->where('agreement_date',$agreement_date_to);
    }
    public function delivery_cost_from(Builder $builder, $delivery_cost_from)
    {
        return $builder->where('delivery_cost', $delivery_cost_from);
    }
    public function delivery_cost_to(Builder $builder, $delivery_cost_to)
    {
        return $builder->where('delivery_cost', $delivery_cost_to);
    }

}