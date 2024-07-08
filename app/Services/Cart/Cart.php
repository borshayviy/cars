<?php

namespace App\Services\Cart;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;

class Cart
{
    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';

    protected SessionManager $session;
    protected $instance;

    public function __construct(SessionManager $session) {
        $this->session = $session;
    }

    protected function getContent():Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ?
            collect([]):
            $this->session->get(self::DEFAULT_INSTANCE);
    }

    protected function createCartItem(int $id, string $description, int $year, int $quantity = 1): Collection
    {
        if ($quantity < self::MINIMUM_QUANTITY) {
            $quantity = self::MINIMUM_QUANTITY;
        }

        return collect([
            'id' => $id,
            'description' => $description,
            'year' => $year,
            'quantity' => $quantity,
        ]);
    }
}
