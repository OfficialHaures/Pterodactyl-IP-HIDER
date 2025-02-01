<?php

namespace ActivityIpHider;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Pterodactyl\Models\ActivityLog;
use ActivityIpHider\Models\ActivityIp;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        ActivityLog::created(function ($activity) {
            $this->handleIpStorage($activity);
        });

        Gate::define('view-original-ip', function ($user) {
            return $user->root_admin;
        });
    }

    protected function handleIpStorage($activity)
    {
        if ($activity->ip) {
            ActivityIp::create([
                'activity_id' => $activity->id,
                'ip_address' => $activity->ip
            ]);

            $activity->ip = '[hidden]';
            $activity->save();
        }
    }

    public function register()
    {
        $this->app->singleton('activity-ip-hider', function($app) {
            return new ActivityIpHider();
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/activity-ip-hider.php', 'activity-ip-hider'
        );
    }

    public function provides()
    {
        return ['activity-ip-hider'];
    }
}
