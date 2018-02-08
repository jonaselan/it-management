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

    /*public function show($id){
        // INPUT for get element by request parameters
        // $id = Request::input('id', '0');
        // in this case you can use ROUTE instead, for get on route
        $response = Product::find($id);
        return view('product.show')->with('p', $response);
    }

    public function edit($id){
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(ProductsRequest $request, $id){
        $product = Product::find($id)->update($request->all());
        return redirect()
            ->action('ProductController@index');
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductsRequest $request){
        Product::create($request->all());
        return redirect()
            ->action('ProductController@index')
            ->withInput(Request::only('name'));
    }

    public function destroy($id){
        Product::find($id)->delete();
        return redirect()
            ->action('ProductController@index');
    }*/
}
