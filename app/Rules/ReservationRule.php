<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ReservationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $_driver_id,
            $_waitingplace_id,
            $_start_at,
            $_end_at,
            $_fee;
    
    public function __construct($driver_id,$waitingplace_id, $start_at, $end_at,$fee)
    {
        $this->_driver_id = $driver_id;
        $this->_waitingplace_id = $waitingplace_id;
        $this->_start_at = $start_at;
        $this->_end = $end_at;
        $this->_fee = $fee;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return \App\Reservation::where('waitingplace_id', $this->_waitingplace_id)
        ->whereHasReservation($this->_start_at, $this->_end)
        ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '他の予約が入っています。';
    }
}
