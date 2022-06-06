<?php

namespace App\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Master\Contractor;
use App\Master\Supplier;
use App\Master\Location;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbt_purchase_orders';

    protected $fillable = [
        'po_no', 'transaction_code', 'requisition_slip_no',
        'contractor_id', 'supplier_id', 'location_id',
        'purchase_date', 'purchase_cost', 'prepared_by_id', 'notes'
    ];

    public $validationrules = [
        'po_no' => 'required|numeric|unique:tbt_purchase_orders', 
        'transaction_code' => 'nullable|max:20|unique:tbt_purchase_orders', 
        'requisition_slip_no' => 'required|max:20',
        'contractor_id' => 'required|integer', 
        'supplier_id' => 'required|integer', 
        'location_id' => 'required|integer',
        'purchase_date' => 'required|date', 
        'purchase_cost' => 'nullable|numeric', 
        'prepared_by_id' => 'nullable|integer', 
        'notes' => 'nullable|max:255'
    ];

    public $validationmessages = [
        'po_no.required' => 'PO No is required',
        'po_no.numeric' => 'PO No must be number',
        'po_no.unique'  => 'PO No is already used',

        'requisition_slip_no.required' => 'Requisition No is required',
        'requisition_slip_no.numeric' => 'Requisition No must be number',

        'contractor_id.required' => 'Contractor is required',
        'contractor_id.integer' => 'Contractor is required',

        'supplier_id.required' => 'Supplier is required',
        'supplier_id.integer' => 'Supplier is required',

        'location_id.required' => 'Location is required',
        'location_id.integer' => 'Location is required',
        
    ];

    public static function createRecord($values): self
    {
        return self::create([
            'po_no' => $values['po_no'], 
            'transaction_code' => $values['transaction_code'], 
            'requisition_slip_no' => $values['requisition_slip_no'],
            'contractor_id' => $values['contractor_id'], 
            'supplier_id' => $values['supplier_id'], 
            'location_id' => $values['location_id'],
            'purchase_date' => $values['purchase_date'], 
            'purchase_cost' => $values['purchase_cost'], 
            'prepared_by_id' => $values['prepared_by_id'], 
            'notes' => $values['notes']
        ]);

    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
