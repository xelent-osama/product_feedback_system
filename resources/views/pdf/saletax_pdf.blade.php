<!DOCTYPE html>
<html>
<head>
    <title>DateWise SaleTax Report</title>
</head>
<body>
    <h1>{{ $sub_comp_data->name }}</h1>
    
    <div id="print" class="">
        {{-- <div style="width:95%; padding:8px; margin-left:12px;">
            <div >
                <h5 style="font-size: 20px;">
                    {{ sub_company ? sub_company.name : "-" }}
                    <br />
                    {{ sub_company ? sub_company.address : "-" }}
                </h5>
                
            </div>
            
            <div>
                <h5  style="font-size: 16px">
                    STRN : {{ sub_company ? sub_company.strn : "-" }}
                    <br />
                    NTN : {{ sub_company ? sub_company.ntn : "-" }}
                </h5>
            </div>
        </div>
        <div>
            <br />
        </div> --}}

    <table id="table_id" style="width:100%; border: 1px solid #000; border-collapse: collapse;">
    <thead class="bg-white z-50 sticky top-[43px] overflow-scroll">
        <tr>
            <th style="border: 1px solid #000; border-collapse:collapse; padding: 0px; width:100px;">Date</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Purchase tax C.Inv</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Sr#</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Company</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">CNIC</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">STRN / NTN</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Item</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Quantity</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Price</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Exclusive Value</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Fright</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Addition Value</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Sale Tax</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">MRP</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">incl rate</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Inclusive</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">WH Collection</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Balance</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @php
            $sum_qty = 0;
            $sum_exclusiv = 0;
        @endphp
        @foreach ($getData as $get_report)
            
        
            <tr>
                
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{  $get_report->date ? $get_report->date : '--' }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->purcahsetax && $get_report->purcahsetax->c_inv ? $get_report->purcahsetax->c_inv : "--" }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->sale_tax_no ? $get_report->sale_tax_no : "--" }}</td>

                <!-- CUSTOMER NAME -->
                @if ($get_report->walking_customer == 0 || $get_report->walking_customer == null)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                {{ $get_report->customer ? $get_report->customer->name : "--"  }}</td>
                @endif

                @if ($get_report->walking_customer == 1)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                {{ $get_report->walkingcustomer ? $get_report->walkingcustomer->name : "--"  }}</td>
                @endif
                <!-- END  -->

                <!-- CUSTOMER CNIC -->
                @if ($get_report->walking_customer == 0 || $get_report->walking_customer == null)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                {{ $get_report->customer ? $get_report->customer->cnic_no : "--"  }}</td>
                @endif

                @if ($get_report->walking_customer == 1)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                --</td>
                @endif
                <!-- END  -->

                <!-- CUSTOMER STRN/NTN -->

                @if ($get_report->walking_customer == 0 || $get_report->walking_customer == null)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                    <small>  {{ $get_report->customer ? $get_report->customer->strn : "--"  }}, {{$get_report->customer ? $get_report->customer->ntn : "--"  }}
                    </small>
                </td>
                @endif

                @if ($get_report->walking_customer == 1)
                    
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"
                >
                    <small>  {{ $get_report->walkingcustomer ? $get_report->walkingcustomer->strn : "--"  }}, {{ $get_report->walkingcustomer ? $get_report->walkingcustomer->ntn : "--"}}
                    </small>

                </td>
                @endif
                <!-- END  -->


                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->item ? $get_report->item->name : "--" }}</td>
                <td id="qty" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->qty ? $get_report->qty : 0 }}</td>
                
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ $get_report->rate ? $get_report->rate : 0  }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ ($get_report->exl_value ? $get_report->exl_value : 0) }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ ($get_report->frieght_addition ? $get_report->frieght_addition : 0) * ($get_report->qty ? $get_report->qty : 0) }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ ($get_report->addition_val ? $get_report->addition_val : 0) * ($get_report->qty ? $get_report->qty : 0) }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ $get_report->sale_tax ? $get_report->sale_tax : 0 }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ $get_report->mrp ? $get_report->mrp : 0 }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{((+($get_report->exl_value ? $get_report->exl_value : 0) + +($get_report->sale_tax ? $get_report->sale_tax : 0)) / ($get_report->qty ? $get_report->qty : 0)) }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{($exclu_plus_fed = +($get_report->exl_value ? $get_report->exl_value : 0) + +($get_report->sale_tax ? $get_report->sale_tax : 0)) }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->wh_collection ? $get_report->wh_collection : 0 }}</td>
                <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{(+$exclu_plus_fed + +($get_report->wh_collection ? $get_report->wh_collection : 0))}}</td>
            </tr>

            @php 
            $sum_qty = $sum_qty + $get_report->qty;
            $sum_exclusiv = $sum_exclusiv + $get_report->exl_value;
            @endphp

            @endforeach

            <tr class="">
            <td colspan="7" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>   Total </b>
            </td>
            <td colspan="1" id="qty_total">
                <b> {{$sum_qty}} </b>
            </td>
            <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
            
            </td>
            <td colspan="1" id="exclu_total" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b> {{$sum_exclusiv}} </b>
            </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>    </b>
            </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>    </b>
            </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>    </b>
            </td>
                <td colspan="2" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>   </b>
            </td>
            <td colspan="1" id="inclus_total" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>  </b>
            </td>
            <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>   </b>
            </td>
            <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                <b>   </b>
            </td>
            
            </tr>
        
    </tbody>
    </table>
    <br />
    <br />
    <br />
    <br />
    <div style="padding:19px;" >
        <div style="width:40%; margin-left:42px;">Prepared by : ______________________________</div>
        <div style="width:40%; float:right; margin-top: -25px;">Recieved by : _________________________________</div>
    </div>
    <br />
    </div>


</body>
</html>