<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Contract;
use itmanagement\Http\Requests\ContractRequest;
use Request;
use Auth;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $contracts = Contract::latest()
                            ->where('client_id', Auth::user()->client_id)
                            ->simplePaginate(7);

        return view('contract.index')
                ->withContracts($contracts);
    }

    public function create(){
        return view('contract.create');
    }

    public function store(ContractRequest $request){
        flash("Contrato criado com sucesso!");
        Contract::create($request->all());
        return redirect()
            ->action('ContractController@index');
    }

    public function destroy($id){
        flash("Contrato removido com sucesso!");
        Contract::find($id)->delete();
        return redirect()
            ->action('ContractController@index');
    }

    public function edit($id){
        $contract = Contract::find($id);
        return view('contract.edit', compact('contract'));
    }

    public function update(ContractRequest $request, $id){
        flash("Contrato editado com sucesso!");
        Contract::find($id)->update($request->all());
        return redirect()
            ->action('ContractController@index');
    }

//    public function show($id){
//        $response = Contract::find($id);
//        return view('contract.show')->with('p', $response);
//    }
}
