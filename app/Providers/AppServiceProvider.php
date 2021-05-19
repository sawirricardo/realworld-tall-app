<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Html;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->bootMenu();
    }

    public function bootMenu()
    {
        Menu::macro('app', function () {
            return Menu::new()
                ->addClass('nav navbar-nav pull-xs-right')
                ->add(Link::to(route('front.index'), 'Home'))
                ->addIf(
                    auth()->check(),
                    Link::to(
                        route('app.article.create'),
                        Html::raw('<i class="ion-compose"></i>&nbsp;New Post')->render()
                    )
                )
                ->addIf(
                    auth()->check(),
                    Link::to(
                        route('app.setting'),
                        Html::raw('<i class="ion-gear-a"></i>&nbsp;Settings')->render()
                    )
                )
                ->addIf(
                    auth()->check(),
                    Html::raw('<form id="logout" method="POST" action="' . route('logout') . '">
                            <a href="#" class="nav-link" onclick="event.preventDefault();this.closest(`form`).submit()">
                                Logout
                            </a>
                            ' . csrf_field() . '

                        </form>')->addParentClass('nav-item')
                )
                ->addIf(
                    !auth()->check(),
                    Link::to(route('app.login'), 'Sign In')
                )
                ->addIf(
                    !auth()->check(),
                    Link::to(route('app.register'), 'Sign Up')
                )
                ->each(function (Link $link) {
                    return  $link->addParentClass('nav-item');
                })
                ->each(function (Link $link) {
                    return $link->addClass('nav-link');
                })
                ->setActiveClassOnLink('active')
                ->setActiveFromRequest();
        });
    }
}
