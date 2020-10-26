<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $appends = ['subtotal', 'unit_price_to_money'];

    protected $hidden  = ['unit_price', 'invoice_id' ];

    public function getUnitPriceToMoneyAttribute()
    {
      	return "$ ".number_format($this->unit_price, 2, ',', '.');
    }

	public function getSubtotalAttribute()
    {
    	$sum = $this->unit_price * $this->quantity;
      	return "$ ".number_format($sum, 2, ',', '.');
    }

}
