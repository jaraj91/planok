<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;
use App\Enums\QuotationStatus;
use Illuminate\Support\Carbon;

class QuotationDTO
{
    public function __construct(
        private int $id,
        private string $customer,
        private string $userFirstName,
        private string $userLastName,
        private float $subTotal,
        private float $discount,
        private float $total,
        private float $credit,
        private float $creditAmount,
        private string $status,
        private string $createdAt,
        private string $updatedAt,
    ) {
    }

    public function id()
    {
        return $this->id;
    }

    public function customer()
    {
        return Str::of($this->customer)->title();
    }

    public function user()
    {
        return Str::of($this->userFirstName)
            ->append(' ')
            ->append($this->userLastName)
            ->title();
    }

    public function subTotal()
    {
        return Str::of($this->subTotal)->currency();
    }

    public function discount()
    {
        return Str::of($this->subTotal * $this->discount / 100)
            ->currency()
            ->append(' (' . $this->discount . '%)');
    }

    public function total()
    {
        return Str::of($this->total)->currency();
    }

    public function credit()
    {
        return Str::of($this->credit)->currency();
    }

    public function creditAmount()
    {
        return Str::of($this->creditAmount)->currency();
    }

    public function status()
    {
        return QuotationStatus::from($this->status);
    }

    public function createdAt()
    {
        return Carbon::make($this->createdAt)->format('d-m-Y');
    }

    public function updatedAt()
    {
        return Carbon::make($this->updatedAt)->format('d-m-Y');
    }
}
