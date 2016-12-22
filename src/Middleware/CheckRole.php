<?php

    namespace Skydiver\RapydDashboard\Middleware;

    use Closure;

    class CheckRole {

        public function handle($request, Closure $next) {

            $roles = $this->getRequiredRoleForRoute($request->route());

            if($request->user()->hasRole($roles) || !$roles) {
                return $next($request);
            }

            abort(404);

        }

        private function getRequiredRoleForRoute($route) {
            $actions = $route->getAction();
            return isset($actions['roles']) ? $actions['roles'] : null;
        }

    }

?>