<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Invoice extends Model
{


    use HasFactory;

    protected $appends = ['created_at_format_es', 'item_count', 'total', 'iva', 'document_number_format' ];

    protected $hidden  = ['created_at', 'updated_at', 'observation', 'document_number' ];


    public function items() {
        return $this->hasMany(InvoiceItem::class);
    }

    public function getDocumentNumberFormatAttribute()
    {
      $number = $this->document_number;

      switch ($this->document_type) {
        case 'C.U.I.T':

          $parsed = substr($number,0,2).'-'.substr($number,2,8).'-'.substr($number,-1,1);
          return $parsed;
          break;
        case 'C.U.I.L':

          $parsed = substr($number,0,2).'-'.substr($number,2,8).'-'.substr($number,-1,1);
          return $parsed;
          break;
        default:


          return number_format($this->document_number, 0, '.', '.');

          break;
      }




    }


    public function getCreatedAtFormatEsAttribute()
    {
      return $this->created_at->format('d-m-Y');
    }

    public function getItemCountAttribute()
    {
      return $this->items->count();
    }

    public function getIvaAttribute()
    {

      if($this->letter == 'A'){

	    $total = 0;

	    foreach($this->items as $item){
	    	$total += $item->unit_price * $item->quantity;
	    }

      	$iva = $total * 0.21;
      	return "$ ".number_format($iva, 2, ',', '.');

      }else{

      	return null;

      }

    }

    public function getTotalAttribute()
    {
      $total = 0;

      foreach($this->items as $item){
      	$total += $item->unit_price * $item->quantity;
      }


      if($this->letter == 'A'){
      	$total += $total * 0.21;
      }

      return "$ ".number_format($total, 2, ',', '.');

    }



}
