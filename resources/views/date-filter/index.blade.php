@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Successful Donation List</h4>
                <button id="btnExport" onclick="fnExcelReport();"> Export Excel</button>
            </div>
            <div class="card-body">

                @if(isset($details))

                <div class="table-responsive">
                    <table id="table2excel" class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Transaction Status
                                </th>
                                <th>
                                    Total Amount
                                </th>
                                <th>
                                    Payment Provider
                                </th>
                                <th>
                                    merchantOrderId
                                </th>
                                <th class="text-right">
                                    Detail >
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $donation_list)
                            <tr>
                                <td>
                                    {{$donation_list->id}}
                                </td>
                                <td>
                                    {{$donation_list->customerName}}
                                </td>
                                <td>
                                    {{$donation_list->transactionStatus}}
                                </td>
                                <td>
                                    {{$donation_list->totalAmount}}
                                </td>
                                <td>
                                    {{$donation_list->providerName}}
                                </td>
                                <td>
                                    {{$donation_list->merchantOrderId}}
                                </td>

                                <td class="text-right">

                                    <a href="/dashboard/{{$donation_list->merchantOrderId}}/success-detail/"><input style="margin-top:10px;" class="btn btn-success" type="button" value="Detail" /></a>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery CDN -->
<script type='text/javascript'>
    function fnExcelReport() {
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
        var textRange;
        var j = 0;
        tab = document.getElementById('table2excel'); // id of table

        for (j = 0; j < tab.rows.length; j++) {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
        }

        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
        {
            txtArea1.document.open("txt/html", "replace");
            txtArea1.document.write(tab_text);
            txtArea1.document.close();
            txtArea1.focus();
            sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
        } else //other browser not tested on IE 11
            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

        return (sa);
    }
</script>

@endsection