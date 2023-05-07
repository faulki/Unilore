<?php
/*namespace App;
class stripe{


        public function __construct(){
            Stripe::setApiKey("sk_test_51MUm5wAZEII6b3KDjcldJEzML9fnKcH5sDb2OB4ptkoYLqAn4W7ittnnpbMCzavWgs6rGODzgkXUqQRzhtQpLB7k004fHZxbwn");
            Stripe::setApiVersion ('2020-08-27');
        }
        
        public function startPayment (Card $product)
        {
            $cartId = $product->getId();
            $session = Session::create([
            'line_items' => [
                array_map(fn(array $value) => [
                    'quantity'=> 1,
                    'price_data' => [
                        'currency' =>'EUR',
                        'product_data' => [
                            'name' => $value['nom_adhesion_pre']
                        ],
                        'unit_amount' => $value['prix_adhesion_pre']
                    ]
                ], $product->getInfoslesAdhesion())
            ],
            'mode' => 'payment',
            'success_url' => 'http://172.19.0.3/Stage/',
            'cancel_url' 'http://172.19.0.3/Stage/',
            'billing_address_collection' => 'required',
            'shipping_address_collection'=> [
                'allowed_countries' => ['FR']
            ],
            'metadata' => [
                'cart_id' => $cartId
            ]
        ]);
        $product->setSessionId($session->id);
        header("HTTP/1.1 303 See Other");
        header("Location : " . $session->url);
        }
}*/

class PaymentController
{
    public function checkout()
    {
        \Stripe\Stripe::setApiKey("sk_test_51MUm5wAZEII6b3KDjcldJEzML9fnKcH5sDb2OB4ptkoYLqAn4W7ittnnpbMCzavWgs6rGODzgkXUqQRzhtQpLB7k004fHZxbwn");

        $amount = 1;
        $currency = "eur";

        try {
            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => 'Product name',
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'https://example.com/cancel',
            ]);
        } catch (\Stripe\Error\Base $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }

        echo json_encode(['sessionId' => $checkout_session['id']]);
    }
}

?>