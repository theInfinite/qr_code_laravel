<?php

namespace App\Observers;

use App\Guest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuestObserver
{

    public function creating(Guest $guest)
    {
        $guest->qr_code = $this->generateQRCode();
        $qrImageName = 'tickets/et-'.$guest->qr_code.'.png';
        QrCode::format('png')->size(500)->errorCorrection('H')
            ->generate( 'QR Code : '.$guest->qr_code.'AND Guest Name : '.$guest->guest_name,
                storage_path('app/public/' . $qrImageName));
        $guest->qr_code_image = $qrImageName;
    }

    protected function generateQRCode()
    {
        $token = strtolower(str_random(15));
        if(Guest::where('qr_code', $token)->first()) {
            return $this->generateQRCode();
        }
        return $token;
    }

    /**
     * Handle the guest "created" event.
     *
     * @param  \App\Guest  $guest
     * @return void
     */
    public function created(Guest $guest)
    {
        //
    }

    /**
     * Handle the guest "updated" event.
     *
     * @param  \App\Guest  $guest
     * @return void
     */
    public function updated(Guest $guest)
    {
        //
    }

    /**
     * Handle the guest "deleted" event.
     *
     * @param  \App\Guest  $guest
     * @return void
     */
    public function deleted(Guest $guest)
    {
        //
    }

    /**
     * Handle the guest "restored" event.
     *
     * @param  \App\Guest  $guest
     * @return void
     */
    public function restored(Guest $guest)
    {
        //
    }

    /**
     * Handle the guest "force deleted" event.
     *
     * @param  \App\Guest  $guest
     * @return void
     */
    public function forceDeleted(Guest $guest)
    {
        //
    }
}
