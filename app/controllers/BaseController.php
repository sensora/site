<?php
class BaseController extends Controller
{
    protected $currentUser = false;

    public function __construct()
    {
        /**
         * Clockwork on development :D
         */
        if ( App::environment('local') ) {
            $this->beforeFilter(function() {
                Event::fire('clockwork.controller.start');
            });

            $this->afterFilter(function() {
                Event::fire('clockwork.controller.end');
            });
        }

        $this->currentUser = Auth::user();
        View::share('currentUser', $this->currentUser);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }
}