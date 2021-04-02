<?php

    namespace App\Repositories;

    use App\Models\Contact;
    use Illuminate\Support\Collection;

    interface ContactRepositoryInterface
    {
        public function storeCsvContents(Array $csvdata);
    }
