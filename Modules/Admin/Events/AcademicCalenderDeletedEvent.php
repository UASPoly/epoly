<?php

namespace Modules\Admin\Events;

use Illuminate\Queue\SerializesModels;

class AcademicCalenderDeletedEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCalenderDeletedSuccessMessage();
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

    public function setCalenderDeletedSuccessMessage()
    {
        session()->flash('message','Congratulation the new academic calender is deleted successfully you can create another one here denying of this will cause improper function of some part of this application');
    }
}
