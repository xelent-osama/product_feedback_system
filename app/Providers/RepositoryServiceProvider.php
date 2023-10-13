<?php

namespace App\Providers;


use App\Contracts\SaleTaxes\VehicleContract;
use App\Contracts\SaleTaxes\DriverContract;
use App\Contracts\SaleTaxes\HelperContract;
use App\Contracts\SaleTaxes\SubCompanyContract;
use App\Contracts\SaleTaxes\ItemContract;
use App\Contracts\SaleTaxes\SupplierContract;
use App\Contracts\SaleTaxes\PurchaseSupplierContract;
use App\Contracts\SaleTaxes\PaymentTermContract;
use App\Contracts\SaleTaxes\CustomerContract;
use App\Contracts\SaleTaxes\AgentContract;
use App\Contracts\SaleTaxes\PurchaseContract;
use App\Contracts\SaleTaxes\PurchaseReturnContract;
use App\Contracts\SaleTaxes\EstimateWholeSaleContract;
use App\Contracts\SaleTaxes\EstimateRetailSaleContract;
use App\Contracts\SaleTaxes\WholeSaleContract;
use App\Contracts\SaleTaxes\WholeSaleReturnContract;
use App\Contracts\SaleTaxes\RetailSaleContract;
use App\Contracts\SaleTaxes\RetailSaleReturnContract;
use App\Contracts\SaleTaxes\VoucherContract;
use App\Contracts\SaleTaxes\DeliveryChallanContract;
use App\Contracts\SaleTaxes\SaleContract;
use App\Contracts\SaleTaxes\SaleTaxContract;
use App\Contracts\SaleTaxes\PurchaseTaxContract;
use App\Contracts\SaleTaxes\UreaSaleTaxContract;
use App\Contracts\SaleTaxes\UreaPurchaseTaxContract;
use App\Contracts\SaleTaxes\MiscellaneousContract;
use App\Contracts\SaleTaxes\AccountContract;


use Illuminate\Support\ServiceProvider;

use App\Repositories\SaleTaxes\VehicleRepository;
use App\Repositories\SaleTaxes\DriverRepository;
use App\Repositories\SaleTaxes\HelperRepository;
use App\Repositories\SaleTaxes\SubCompanyRepository;
use App\Repositories\SaleTaxes\ItemRepository;
use App\Repositories\SaleTaxes\SupplierRepository;
use App\Repositories\SaleTaxes\PurchaseSupplierRepository;
use App\Repositories\SaleTaxes\PaymentTermRepository;
use App\Repositories\SaleTaxes\CustomerRepository;
use App\Repositories\SaleTaxes\AgentRepository;
use App\Repositories\SaleTaxes\PurchaseRepository;
use App\Repositories\SaleTaxes\PurchaseReturnRepository;
use App\Repositories\SaleTaxes\EstimateWholeSaleRepository;
use App\Repositories\SaleTaxes\EstimateRetailSaleRepository;
use App\Repositories\SaleTaxes\WholeSaleRepository;
use App\Repositories\SaleTaxes\WholeSaleReturnRepository;
use App\Repositories\SaleTaxes\RetailSaleRepository;
use App\Repositories\SaleTaxes\RetailSaleReturnRepository;
use App\Repositories\SaleTaxes\VoucherRepository;
use App\Repositories\SaleTaxes\DeliveryChallanRepository;
use App\Repositories\SaleTaxes\SaleRepository;
use App\Repositories\SaleTaxes\SaleTaxRepository;
use App\Repositories\SaleTaxes\PurchaseTaxRepository;
use App\Repositories\SaleTaxes\UreaSaleTaxRepository;
use App\Repositories\SaleTaxes\UreaPurchaseTaxRepository;
use App\Repositories\SaleTaxes\MiscellaneousRepository;
use App\Repositories\SaleTaxes\AccountRepository;


// EMPLOYEE managment  CONTRACT
use App\Contracts\EmployeeManagment\EmployeeContract;
use App\Contracts\EmployeeManagment\EmployeeAdvanceSalaryContract;
use App\Contracts\EmployeeManagment\EmployeeSalaryPayContract;


// EMPLOYEE managment REPOSTIORY
use App\Repositories\EmployeeManagment\EmployeeRepository;
use App\Repositories\EmployeeManagment\EmployeeAdvanceSalaryRepository;
use App\Repositories\EmployeeManagment\EmployeeSalaryPayRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AccountContract::class         =>          AccountRepository::class,
        MiscellaneousContract::class         =>          MiscellaneousRepository::class,
        ItemContract::class         =>          ItemRepository::class,
        SubCompanyContract::class         =>          SubCompanyRepository::class,
        HelperContract::class         =>          HelperRepository::class,
        DriverContract::class         =>          DriverRepository::class,
        VehicleContract::class         =>          VehicleRepository::class,
        SaleTaxContract::class         =>          SaleTaxRepository::class,
        PurchaseTaxContract::class         =>          PurchaseTaxRepository::class,
        UreaSaleTaxContract::class         =>          UreaSaleTaxRepository::class,
        UreaPurchaseTaxContract::class         =>          UreaPurchaseTaxRepository::class,
        SupplierContract::class     =>          SupplierRepository::class,
        PurchaseSupplierContract::class     =>          PurchaseSupplierRepository::class,
        PaymentTermContract::class  =>          PaymentTermRepository::class,
        CustomerContract::class     =>          CustomerRepository::class,
        AgentContract::class        =>          AgentRepository::class,
        PurchaseContract::class     =>          PurchaseRepository::class,
        PurchaseReturnContract::class    =>          PurchaseReturnRepository::class,
        EstimateWholeSaleContract::class     =>          EstimateWholeSaleRepository::class,
        EstimateRetailSaleContract::class     =>          EstimateRetailSaleRepository::class,
        WholeSaleContract::class    =>          WholeSaleRepository::class,
        WholeSaleReturnContract::class    =>          WholeSaleReturnRepository::class,
        RetailSaleContract::class    =>          RetailSaleRepository::class,
        RetailSaleReturnContract::class    =>          RetailSaleReturnRepository::class,
        VoucherContract::class      =>          VoucherRepository::class,
        DeliveryChallanContract::class      =>          DeliveryChallanRepository::class,
        SaleContract::class      =>          SaleRepository::class,

        // EMPLOYEE managment
        EmployeeContract::class         =>          EmployeeRepository::class,
        EmployeeAdvanceSalaryContract::class         =>          EmployeeAdvanceSalaryRepository::class,
        EmployeeSalaryPayContract::class         =>          EmployeeSalaryPayRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
