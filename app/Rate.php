<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rate
 * @package App
 * @property $usd
 * @property $eur
 * @property $gbp
 */
class Rate extends Model
{
    protected $primaryKey = 'id';
    protected $table      = 'rate';
    protected $fillable   = ['usd', 'eur', 'gbp'];

    public $timestamps = false;

    CONST CURRENCY_USD = 'USD';
    CONST CURRENCY_EUR = 'EUR';
    CONST CURRENCY_GBP = 'GBP';

    /**
     * @return mixed
     */
    public static function parse() {
        $data = file_get_contents(env('CURRENCY_PROVIDER'));
        return json_decode($data);
    }

    /**
     * @param $data \stdClass
     */
    public static function store($data) {
        $rate = new Rate;
        if (isset($data->{Rate::CURRENCY_USD})) {
            $rate->usd = $data->{Rate::CURRENCY_USD}->last;
        }

        if (isset($data->{Rate::CURRENCY_EUR})) {
            $rate->eur = $data->{Rate::CURRENCY_EUR}->last;
        }

        if (isset($data->{Rate::CURRENCY_GBP})) {
            $rate->gbp = $data->{Rate::CURRENCY_GBP}->last;
        }
        $rate->save();
    }
}
