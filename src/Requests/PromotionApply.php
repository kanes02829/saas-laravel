<?php

namespace Helori\LaravelSaas\Requests;

use Illuminate\Support\Arr;


class PromotionApply extends SubscriptionBase
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'promotion_code' => 'required|string|max:191',
        ];
    }

    /**
     * Run the action the request is supposed to execute
     *
     * @return void
     */
    public function action()
    {
        $billable = $this->user()->billable();

        $subscription = $billable->subscription($this->name);
        if(!$subscription){
            abort(422, "Abonnement introuvable");
        }

        $promotion = $billable->findPromotionCode($this->promotion_code);
        if(!$promotion){
            abort(422, "Code promotionnel introuvable");
        }

        $subscription->applyPromotionCode($promotion->id);
        
        // Could also be applied on customers :
        //$billable->applyPromotionCode($promotion->id);
        
        return $promotion;
    }
}
