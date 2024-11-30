<?php

namespace Modules\Color\Services;

use Modules\Color\Models\Color;



class ColorService
{
    public $ColorModel;

    public function __construct(Color $ColorModel)
    {
        $this->ColorModel = $ColorModel;
    }


    public function index()
    {
        return $this->ColorModel->paginate();
    }

    public function store(array $data)
    {

        $Color = $this->ColorModel->create($data);
        return $Color;
    }

    public function show($id)
    {
        $Color = $this->ColorModel->findOrFail($id);
        return $Color;
    }
    public function update($id, $data)
    {

        $Color = $this->show($id);
        $Color->update($data);
        return $Color;
    }

    public function destroy($id)
    {
        $Color = $this->show($id);

        $Color->delete();

     }
}
