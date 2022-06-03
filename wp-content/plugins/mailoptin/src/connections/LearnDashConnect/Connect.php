<?php

namespace MailOptin\LearnDashConnect;

class Connect
{
    public function __construct()
    {
        add_action('plugins_loaded', function () {

            if (class_exists('\SFWD_LMS')) {
                Course::get_instance();
                Group::get_instance();
                LearnDashInit::get_instance();
            }
        });
    }

    /**
     * @return Connect
     */
    public static function get_instance()
    {
        static $instance = null;

        if (is_null($instance)) {
            $instance = new self();
        }

        return $instance;
    }

}