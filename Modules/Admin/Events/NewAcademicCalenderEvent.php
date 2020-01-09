<?php

namespace Modules\Admin\Events;

use Illuminate\Queue\SerializesModels;

class NewAcademicCalenderEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $session;

    public function __construct($session)
    {
        $this->session = $session;
        $this->setCalenderRegisterSuccessMessage();
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
    
    public function setCalenderRegisterSuccessMessage()
    {
        session()->flash('message','Congratulation the new '.$this->session.' academic calender is registered successfully');
    }
}
