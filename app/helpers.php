<?php

use App\Models\FlashBarter;
use Carbon\Carbon;

if(!function_exists('formatTime'))
{
    /**
     * format Time
     */
    function formatTime($time, $opt = "12")
    {
        return match($opt) {
            default => '',
            '12' => date('h:iA', strtotime($time)),
        };
    }

}

if(!function_exists('formatDate'))
{
    /**
     * format date
     */
    function formatDate($date, $opt="fulldate")
    {
        return match($opt) {
            default => '',
            'dateInput' => date('Y-m-d'),
            'fulldate' => date('F d,Y', strtotime($date)),
            'dateTime' => date('M d,Y h:iA', strtotime($date)),
            'dateTimeWithSeconds' => date('Y-m-d h:i:s', strtotime($date)),
            'dateTimeLocal' => date('Y-m-d\TH:i', strtotime($date)),
            'time' => date('h:iA', strtotime($date)),
        };
    }

}

if(!function_exists('getAge'))
{
    /**
     * get the age by birth date
     */
     function getAge($birth_date)
    {
        return Carbon::parse($birth_date)->age;
    }

}




if(!function_exists('handleNullAvatar'))
{
    /**
     * handle Null Avatar Image
     */
    function handleNullAvatar($img)
    {
        return $img ?? '/img/noimg.svg';
    }
}


if(!function_exists('handleNullImage'))
{
    /**
     * handle Null Image
     */
    function handleNullImage($img)
    {
        return $img ?? '/img/noimg.png';
    }
}

if(!function_exists('handlePostStatus'))
{
     /**
     * hanlde the post status
     */
    function handlePostStatus($bool)
    {
        return match($bool) {
            0 => "<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>",
            1 => "<span class='badge badge-success'>Approved <i class='fas fa-check-circle ml-1'></i></span>",
            2 => "<span class='badge badge-danger'>Rejected <i class='fas fa-times-circle ml-1'></i></span>",
        };
    }

}

if(!function_exists('handlePaymentStatus'))
{
     /**
     * hanlde the payment status
     */
    function handlePaymentStatus($bool)
    {
        return match($bool) {
            0 => "<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>",
            1 => "<span class='badge badge-success'>Confirmed <i class='fas fa-check-circle ml-1'></i></span>",
            2 => "<span class='badge badge-danger'>Rejected <i class='fas fa-times-circle ml-1'></i></span>",
        };
    }

}

if(!function_exists('handlePaymentableType'))
{
     /**
     * hanlde the paymentable type
     */
    function handlePaymentableType($paymentable)
    {
        return match($paymentable) {
            "App\Models\Subscription" => "<span class='badge badge-warning'>Subscription ⚡</span>",
            "App\Models\FlashBarter" => "<span class='badge badge-warning'>Flash Barter ⚡</span>",
            "App\Models\BoostedPost" => "<span class='badge badge-warning'>Boosted Post ⚡</span>",
            "App\Models\Ad" => "<span class='badge badge-warning'>Advertisement ⚡</span>",
        };
    }

}

if(!function_exists('handleNullFeaturedPhoto'))
{
    /**
     * handle Null Image
     */
    function handleNullFeaturedPhoto($img)
    {
        return $img ?? '/img/image_not_found.svg';
    }
}

if(!function_exists('handleAddOnsStatus'))
{
     /**
     * check if the add-ons status (boosted post| flash barter | ads ) is approved
     */
    function handleAddOnsStatus($bool)
    {
        return match($bool) {
            0 => "<span class='badge badge-info'>Waiting for Approval <i class='fas fa-spinner ml-1'></i></span>",
            1 => "<span class='badge badge-success'>Approved <i class='fas fa-check-circle ml-1'></i></span>",
            2 => "<span class='badge badge-danger'>Rejected <i class='fas fa-times-circle ml-1'></i></span>",
        };
    }

}

if(!function_exists('handleFavoriteType'))
{
     /**
     * check if the status is approved
     */
    function handleFavoriteType($type)
    {
        return match($type) {
            'App\Models\Post' => "<span class='badge badge-primary'>Post</span>",
            'App\Models\User' => "<span class='badge badge-primary'>Artist</span>",
            'App\Models\Service' => "<span class='badge badge-primary'>Service</span>",
        };
    }

}


if(!function_exists('isLikedByAuthUser'))
{
     /**
     * check if this model is liked by authenticated user
     */
    function isLikedByAuthUser($auth_user, $likers) 
    {
        $post_likers = [];// users who likes the post

        foreach($likers as $liker) {
        $post_likers[] = $liker->user_id; // get user id 
        }

        return  (in_array($auth_user, $post_likers)) ? true : false; // check if the user has already liked the post
    }
}

if(!function_exists('isMarkedAsFavoriteByAuthUser'))
{
     /**
     * check if this model is marked as favorite by authenticated user
     */
    function isMarkedAsFavoriteByAuthUser($auth_user, $model_favorities) 
    {

        $users = []; // users who marked as favorite 

        foreach($model_favorities as $favorite) {
            $users[] = $favorite->user_id; // get user id 
        }

        return  (in_array($auth_user, $users)) ? true : false; // check if the user has already marked as favorite this model
    }
}


if(!function_exists('isOnFlashBarter'))
{
     /**
     * check if this model is on the flash barters
     */
    function isOnFlashBarter($post) 
    {
        $posts = []; // posts that are in flashbarters

        $flash_barters = FlashBarter::where('is_expired', false)->get();

        foreach($flash_barters as $flash_barter) {
            $posts[] = $flash_barter->post_id; // get post id
        }

        return  (in_array($post, $posts)) ? true : false; // check if the post has already in the flash barters
    }
}


if(!function_exists('isApproved'))
{
     /**
     * check if the status is approved
     */
    function isApproved($bool)
    {
        return match($bool) {
            0 => "<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>",
            1 => "<span class='badge badge-success'>Approved <i class='fas fa-check-circle ml-1'></i></span>",
            2 => "<span class='badge badge-danger'>Declined <i class='fas fa-times-circle ml-1'></i></span>",
        };
    }

}

if(!function_exists('isActivated'))
{
     /**
     * check if the user account status is activated
     */
    function isActivated($bool)
    {
        return $bool  ? "<span class='badge badge-success'>Activated <i class='fas fa-check-circle ml-1'></i></span>" : "<span class='badge badge-danger'>Deactivated</span>";
    }
}

if(!function_exists('isOnline'))
{
     /**
     * check if the payment method status is approved
     */
    function isOnline($bool)
    {
        return $bool  ? "<span class='badge badge-success'>Online <i class='fas fa-check-circle ml-1'></i></span>" : "<span class='badge badge-danger'>Offline</span>";
    }

}


if(!function_exists('isVerified'))
{
     /**
     * check if the user email is verified
     */
    function isVerified($bool)
    {
        return $bool  ? "<span class='badge badge-success'>Verified <i class='fas fa-check-circle ml-1'></i></span>" : "<span class='badge badge-danger'>Unverified</span>";
    }
}


if(!function_exists('handleBarterStatus'))
{
     /**
     * check if the barter status is bartered
     */
    function handleBarterStatus($status)
    {   
        return match($status) {
            0 => "<span class='badge badge-info'>Pending <i class='fas fa-spinner ml-1'></i></span>",
            1 => "<span class='badge badge-success'>Bartered <i class='fas fa-check-circle ml-1'></i></span>",
            2 => "<span class='badge badge-danger'>Rejected <i class='fas fa-times-circle ml-1'></i></span>",
        };
    }

}