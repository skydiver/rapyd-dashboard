# Rapyd Dashboard
Backend dashboard for Laravel 5.3

Rapyd + AdminLTE



## Instructions

**composer.json**
```
"require": {
	"skydiver/rapyd-dashboard": "dev-master"
},
```

---

**config/app.php**
```php
Skydiver\RapydDashboard\RapydDashboardServiceProvider::class,
```

---

**publish the package's assets to public folder***
```
$ php artisan vendor:publish --provider="Skydiver\RapydDashboard\RapydDashboardServiceProvider"
$ php artisan vendor:publish --provider="Zofe\Rapyd\RapydServiceProvider" --tag=assets
```

---

**config/auth.php**
```php
'model' => Skydiver\RapydDashboard\Models\User::class,
```

---

**config/services.php**
```php
'google' => [
	'client_id'     => env('GOOGLE_CLIENT_ID'),
	'client_secret' => env('GOOGLE_CLIENT_SECRET'),
	'redirect'      => env('GOOGLE_REDIRECT'),
],
```
---

**app/Http/Middleware/VerifyCsrfToken.php**
```php
protected $except = ['dashboard/adminer'];
```

---

**app/Http/Middleware/Authenticate.php**

replace
```php
return redirect()->guest('auth/login');
```
with
```php
return redirect()->guest('oauth');
```

---

