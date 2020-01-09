<?php

namespace Modules\Admin\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Admin\Entities\Session;

class UpdateAcademicCalenderEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session->name;
        $this->setCalenderUpdateSuccessMessage();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function setCalenderUpdateSuccessMessage()
    {
        session()->flash('message','Congratulation the new '.$this->session.' academic calender is registered successfully');
    }
}
