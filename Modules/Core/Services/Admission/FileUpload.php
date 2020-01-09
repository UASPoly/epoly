<?php
namespace Modules\Core\Services\Admission;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function storeFile($file, $location)
    {
        $path = $location.'/'.currentSession()->name.'/';

        $filename = time().$file->getClientOriginalName().'.'.$file->getClientOriginalExtension();

        $fullPath = $path.$filename;
        $file->storeAs($path, $filename, $this->fileSystem());
        
        return $fullPath;
    }

    public function updateFile($model, $field, $data, $location)
    {
        Storage::disk($this->fileSystem())->delete($model->$field);

        $file = $this->storeFile($data, $location);

        $model->$field = $file;
        
        $model->save();
    }

    private function fileSystem()
    {
        return app()->environment('production') ? 's3' : 'public';
    }
}
