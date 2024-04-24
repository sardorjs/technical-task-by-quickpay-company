<?php

namespace App\Http\Resources\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Invoice $resource
 */
class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'customerId' => $this->resource->customer_id,
            'amount' => $this->resource->amount,
            'status' => $this->resource->status,
            'billedDate' => $this->resource->billed_date->format('Y-m-d H:i:s'),
            'paidDate' => $this->resource->paid_date?->format('Y-m-d H:i:s'),
        ];
    }
}
