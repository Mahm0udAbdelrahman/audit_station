<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Auth\Http\Requests\Employee\StoreRequest;
use Modules\Auth\Http\Requests\Employee\UpdateRequest;
use Modules\Auth\Services\EmployeeService;
use Modules\Auth\Transformers\EmployeeResource;

class EmployeeController extends Controller
{
    use HttpResponse;
    public $employee;
  public function __construct(EmployeeService $employee)
  {
      $this->employee = $employee;
  }

    public function index()
    {

        $data = $this->employee->index();
        return $this->paginatedResponse($data, EmployeeResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        
        $data = $this->employee->store($validation);
        return $this->okResponse(new EmployeeResource($data));
    }

    public function show($id)
    {
        $data = $this->employee->show($id);
        return $this->okResponse(new EmployeeResource($data));
    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->employee->update($id, $validation);

        return $this->okResponse(new EmployeeResource($data));
    }

    public function destroy($id)
    {
        $this->employee->destroy($id);
        return $this->okResponse(message: 'employee deleted successfully' );
    }
}
