<?php

enum status: string 
{
    case PENDING = 'pending';
    case INPROCESS = 'in process';
    case COMPLETE = 'complete';

    public function setColor(): string
    {
            return match($this) {
            self::PENDING => "text-red-700",
            self::INPROCESS => "text-purple-700",
            self::COMPLETE => "text-emerald-700"
        };

    }
    
}
