<?php

class Group extends Eloquent {

    public function works()
    {
        return $this->belongsToMany('Work')->withPivot('order')->withTimestamps();
    }

    public function texts()
    {
        return $this->belongsToMany('Text')->withPivot('order')->withTimestamps();
    }

}