<?php require_once('DAL.class.php');



class paymentProcessor extends DAL{
    
    private $stripe;

    public function __construct() {
        $this->stripe = new \Stripe\StripeClient(getenv('STRIPE_SECRET_KEY'));
    }

    public function processPayment($price, $product) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $token = $_POST['stripeToken'];
                $charge = $this->stripe->charges->create([
                    'amount' => $price * 100,
                    'currency' => 'usd',
                    'description' => "Purchase of $product",
                    'source' => $token,
                ]);
                echo 'Payment successful!';
            } catch (\Exception $e) {
                echo 'Payment failed: ' . $e->getMessage();
            }
        }
    }

}