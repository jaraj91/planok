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
        return $this->formatAmount($this->subTotal);
    }

    public function discount()
    {
        return $this->formatAmount($this->subTotal * $this->discount / 100) . ' (' . $this->discount . '%)';
    }

    public function total()
    {
        return $this->formatAmount($this->total);
    }

    public function credit()
    {
        return $this->formatAmount($this->credit);
    }

    public function creditAmount()
    {
        return $this->formatAmount($this->creditAmount);
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

    private function formatAmount(float $amount)
    {
        $decimal = explode('.', (string) $amount)[1] ?? '';
        $decimal = $decimal != '' ? ',' . $decimal : '';
        return '$' . number_format($amount, 0, ',', '.') . $decimal;
    }

}
