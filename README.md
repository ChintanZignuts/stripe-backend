<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <b>Stripe Checkout Demo with Laravel + Vue 3</b><br>
  A simple integration of Stripe’s hosted payment page using Laravel backend and Vue.js frontend.
</p>

---

## 🚀 About the Project

This project demonstrates how to implement **Stripe Checkout (hosted payment page)** in a Laravel + Vue.js application.

Instead of collecting card details via Stripe Elements, the user is securely redirected to Stripe’s checkout page. Once the payment is complete, the user is redirected back to your app and the payment status is confirmed via **webhooks**.

---

## 🧩 Features

-   Laravel API for Stripe Checkout Session creation
-   Vue.js frontend with "Make Payment" button
-   Stripe-hosted payment page (fully secure)
-   Webhook listener to validate payment status
-   Test mode Stripe integration

---

## 🛠️ Technologies Used

-   [Laravel](https://laravel.com) (Backend)
-   [Stripe PHP SDK](https://github.com/stripe/stripe-php)
-   [Vue 3](https://v3.vuejs.org) (Frontend)
-   [Stripe Checkout](https://stripe.com/docs/checkout)
-   [Stripe CLI](https://stripe.com/docs/stripe-cli) (For local webhook testing)

---

## 📦 Setup Instructions

### 1. Clone the Project

```bash
git clone https://github.com/your-username/laravel-stripe-checkout-demo.git
cd laravel-stripe-checkout-demo
```

### 2. Install Laravel Dependencies

```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Set Up Stripe in .env

```bash
STRIPE_SECRET_KEY=sk_test_...
STRIPE_PUBLISHABLE_KEY=pk_test_...
STRIPE_WEBHOOK_SECRET=whsec_... # (Only needed for webhook handling)
```

### 4. Start Laravel Server

```bash
php artisan serve
```
