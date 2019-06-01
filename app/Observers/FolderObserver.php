<?php

namespace App\Observers;

use App\Folder;

class FolderObserver
{
    public function saved(Folder $element) {
        $element->consolidate();

        return true;
    }

    public function deleted(Folder $element) {

    }



    // abstract public function saved($model);

    // abstract public function saving($model);

    // abstract public function deleted($model);

    // abstract public function deleting($model);


}