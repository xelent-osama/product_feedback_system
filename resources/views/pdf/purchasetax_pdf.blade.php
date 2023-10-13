<!DOCTYPE html>
<html>
<head>
    <title>DateWise PurcahseTax Report</title>
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
            <th style="border: 1px solid #000; border-collapse:collapse; padding: 0px; width:150px;">Date</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">GST-Invc</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Company</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Item</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Quantity</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Price</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Exclusive Value</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Sale Tax</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Inclusive</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">WH Collection</th>
            <th style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">Total Charge Val</th>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        @php
            $sum_qty = 0;
            $sum_exclusiv = 0;
        @endphp
        @foreach ($getData as $get_report)
            
        <tr >
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{  $get_report->date ? $get_report->date : '--' }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->c_inv ? $get_report->c_inv : "--" }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->supplier ? $get_report->supplier->name : "--"  }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->item ? $get_report->item->name : "--" }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->qty ? $get_report->qty : 0 }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ $get_report->ex_factory_price ? $get_report->ex_factory_price : 0  }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ ($exclusive = +($get_report->val_saletax_fed ? $get_report->val_saletax_fed : 0) + +($get_report->fed ? $get_report->fed : 0)) }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{ $get_report->sales_tex ? $get_report->sales_tex : 0 }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;"> {{($exclu_plus_fed = ( +$exclusive + +($get_report->sales_tex ? $get_report->sales_tex : 0))) }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{ $get_report->wh_collection ? $get_report->wh_collection : 0 }}</td>
            <td style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">{{(+$exclu_plus_fed + +($get_report->wh_collection ? $get_report->wh_collection : 0))}}</td>
        </tr>

            @php 
            $sum_qty = $sum_qty + $get_report->qty;
            $sum_exclusiv = $sum_exclusiv + $exclusive;
            @endphp

            @endforeach

        <tr class="">
                <td colspan="4" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                  <b>   Total </b>
                </td>
                <td colspan="1">
                 <b> {{ $sum_qty }} </b>
                </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
               
                </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                 <b> {{ $sum_exclusiv }} </b>
                </td>
                 <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                 <b>    </b>
                </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                  <b>  </b>
                </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                 <b>   </b>
                </td>
                <td colspan="1" style="border: 1px solid #000; border-collapse: collapse; padding: 0px;">
                  <b>  </b>
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