<?php

namespace itmanagement\Http\Controllers;

use Illuminate\Support\Facades\DB;
use itmanagement\Contract;
use Illuminate\Auth\Middleware\Authenticate;
use itmanagement\Http\Requests\ContractRequest;
use Request;
use Debugbar;

class ContractController extends Controller
{
    public function index(){
        $contracts = Contract::simplePaginate(7);
        return view('contract.index')->withContracts($contracts);
    }

    public function create(){
        return view('contract.create');
    }

    public function store(ContractRequest $request){
        Contract::create($request->all());
        return redirect()
            ->action('ContractController@index');
    }

    public function destroy($id){
        Contract::find($id)->delete();
        return redirect()
            ->action('ContractController@index');
    }

    public function edit($id){
        $contract = Contract::find($id);
        return view('contract.edit', compact('contract'));
    }

    public function update(ContractRequest $request, $id){
        Contract::find($id)->update($request->all());
        return redirect()
            ->action('ContractController@index');
    }

//    public function show($id){
//        $response = Contract::find($id);
//        return view('contract.show')->with('p', $response);
//    }
}
