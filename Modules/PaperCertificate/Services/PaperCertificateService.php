<?php

namespace Modules\PaperCertificate\Services;

use Modules\PaperCertificate\Models\PaperCertificate;



class PaperCertificateService
{
    public $PaperCertificateModel;

    public function __construct(PaperCertificate $PaperCertificateModel)
    {
        $this->PaperCertificateModel = $PaperCertificateModel;
    }


    public function index()
    {
        return $this->PaperCertificateModel->paginate();
    }

    public function store(array $data)
    {
        $data['communication_method'] = 'Whatsapp';
        $PaperCertificate = $this->PaperCertificateModel->create($data);
        return $PaperCertificate;
    }

    public function show($id)
    {
        $PaperCertificate = $this->PaperCertificateModel->findOrFail($id);
        return $PaperCertificate;
    }
    public function update($id, $data)
    {

        $PaperCertificate = $this->show($id);
        $PaperCertificate->update($data);
        return $PaperCertificate;
    }

    public function destroy($id)
    {
        $PaperCertificate = $this->show($id);

        $PaperCertificate->delete();
    }
}
