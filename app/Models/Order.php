<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const PENDING = 0;
    const PROCESSING = 1;
    const COMPLETED = 2;
    const DECLINED = 3;

    protected $fillable = [
        'order_number', 'user_id', 'status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
        'first_name', 'last_name', 'address', 'post_code', 'phone_number', 'notes'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transaction(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    public static function getAllStatuses(){
        return [
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::COMPLETED => 'Completed',
            self::DECLINED => 'Declined',
        ];
    }
}
