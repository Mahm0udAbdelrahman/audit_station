<?php


namespace Modules\CertificateDesign\Services;

use Modules\CertificateDesign\Models\CertificateDesign;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CertificateDesignService
{
    public $model;
    public function __construct(CertificateDesign $model)
    {
        $this->model = $model;
    }

    public function index()
    { 
            $code = request()->input('code');
            if(isset($code))
            {
                return $this->model->where('barcode_number', 'like', "%$code%")->get();

            }      
        return $this->model->paginate();

        
    }

    public function store(array $data)
    {

        $CertificateDesign = $this->model->create($data);

        $certificate = $data['certificate'];

        if(isset($certificate)) {

            $CertificateDesign->addMediaFromRequest('certificate')->toMediaCollection('certificate');
        }
        return $CertificateDesign;
    }


    public function show($id)
    {
        $CertificateDesign = $this->model->findOrFail($id);
        return $CertificateDesign;
    }

    public function update($id, $data)
    {
        $CertificateDesign = $this->show($id);

        $CertificateDesign->update($data);

        if (isset($data['certificate']) && !empty($data['certificate'])) {
            $certificate =  $CertificateDesign->getFirstMedia('certificate');

            if($certificate) {
                $certificate->delete();
            }

            $CertificateDesign->addMediaFromRequest('certificate')->toMediaCollection('certificate');
        }

            return $CertificateDesign;


    }
    public function destroy($id)
    {
        $CertificateDesign = $this->show($id);
        $CertificateDesign->delete();
    }

   



}
