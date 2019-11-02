<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PayMentGatewayContract;
use App\Chanel;
use App\Http\View\Composers\ChanelComposer;
use App\Mixins\StrMixin;
use App\Services\PostCardSendingService;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(PaymentGateway::class,function(){
        //     return new PaymentGateway('idr');
        // });

        $this->app->singleton(PayMentGatewayContract::class,function(){
            if(request()->has('credit')){
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });

        $this->app->singleton('PostCard',function(){
            return new PostCardSendingService('id',4,6); 
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // option 1 - every single view 
        // View::share('chanels',Chanel::orderBy('name')->get());
        
        // option 2 - gragular views with wildcards
        // View::composer(['chanel.*','post.create'],function($view){
        //     $view->with('chanels',Chanel::orderBy('name','desc')->get());
        // });

        // option 3 -  
        // View::composer(['chanel.*','post.create'],ChanelComposer::class);
        View::composer('partials.chanels.*',ChanelComposer::class);

        Str::macro('partNumber',function($part){
            return 'AB-' . substr($part,0,3) .'-' . substr($part,3);
        });
        // Str::mixin(new StrMixin);
        Str::mixin(new StrMixin,false);

        ResponseFactory::macro('errorJson',function($message =' Default Message'){
            return [
                'message'       => $message,
                'error_code'    => 123
            ];
        });
    }
}
