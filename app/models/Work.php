<?php

class Work extends Eloquent {

    public function groups()
    {
        return $this->belongsToMany('Group')->withPivot('order')->withTimestamps();
    }

}