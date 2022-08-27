<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function commonDiscount()
    {
        return $this->belongsTo(CommonDiscount::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getPaymentStatusValueAttribute()
    {
        switch ($this->payment_status) {
            case 0:
                $res = 'پرداخت نشده';
                break;
            case 1:
                $res = 'پرداخت شده';
                break;
            case 2:
                $res = 'باطل شده';
                break;
            default:
                $res = 'برگشت داده شده';
        }
        return $res;
    }

    public function getPaymentTypeValueAttribute()
    {
        switch ($this->payment_type) {
            case 0:
                $res = 'آنلاین';
                break;
            case 1:
                $res = 'آفلاین';
                break;
            default:
                $res = 'در محل';
        }
        return $res;
    }

    public function getDeliveryStatusValueAttribute()
    {
        switch ($this->delivery_status) {
            case 0:
                $res = 'ارسال نشده';
                break;
            case 1:
                $res = 'درحال ارسال';
                break;
            case 2:
                $res = 'ارسال شده';
                break;
            default:
                $res = 'تحویل شده';
        }
        return $res;
    }

    public function getOrderStatusValueAttribute()
    {
        switch ($this->order_status) {
            case 1:
                $res = 'در انتظار تایید';
                break;
            case 2:
                $res = 'تایید نشده';
                break;
            case 3:
                $res = 'تایید شده';
                break;
            case 4:
                $res = 'باطل شده';
                break;
            case 5:
                $res = 'مرجوع شده';
                break;
            default:
                $res = 'بررسی نشده';
        }
        return $res;
    }
}
