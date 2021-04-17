<?php

declare(strict_types=1);

namespace App\Http\Requests;

final class CreateTicketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $format = config('attendize.default_datetime_format');
        return [
            'title'              => 'required',
            'price'              => 'required|numeric|min:0',
            'description'        => 'nullable',
            'start_sale_date'    => 'nullable|date_format:"'.$format.'"',
            'end_sale_date'      => 'nullable|date_format:"'.$format.'"|after:start_sale_date',
            'quantity_available' => 'nullable|integer|min:'.($this->quantity_sold + $this->quantity_reserved)
        ];
    }
}
